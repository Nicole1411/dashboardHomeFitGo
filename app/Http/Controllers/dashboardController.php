<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\LogProgresousuario;
use App\Models\Progresousuario;
use App\Models\LogUsuarioUpdatesWH;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class dashboardController extends Controller
{

    function getDashboard(Request $request)
    {
        // Establecer la zona horaria a 'America/Guayaquil' (Quito, Ecuador)
        Carbon::setLocale('es'); // Establecer el idioma en español
        Carbon::now()->setTimezone('America/Guayaquil');

        $sesion = session('userSesion');

        //Datos Generales
        $idpersona = $sesion['user']->IDPERSONA;
        $idusuario = Usuario::select('IDUSUARIO')
                    ->where('IDPERSONA',$idpersona)
                    ->first();
        $idUser = $idusuario->IDUSUARIO;

        $nombre =  $this->obtenerPrimerNombre( $sesion['user']->NOMBREPERSONA);
        $apellido =  $this->obtenerPrimerNombre($sesion['user']->APELLDOPERSONA);

        $nombreCompleto = $nombre . ' ' . $apellido;

        $edad = $this->calcularEdad($sesion['user']->FECHANACIMIENTOPERSONA);

        $datosUsuario = [];
        $datosUsuario = Usuario::select('PESOUSUARIO','ALTURAUSUARIO')
            ->join('persona','persona.IDPERSONA','=','usuario.IDPERSONA')
            ->where('persona.IDPERSONA',$sesion['user']->IDPERSONA)
            ->get();

            // Verificar si se obtuvieron resultados
            if ($datosUsuario->count() > 0) {
                // Obtener el peso y la altura del usuario
                $pesoUsuario = $datosUsuario[0]->PESOUSUARIO; // Peso en kilogramos
                $alturaUsuario = $datosUsuario[0]->ALTURAUSUARIO; // Altura en metros

                // Calcular el IMC
                $IMC = $pesoUsuario/($alturaUsuario*$alturaUsuario);
                $IMC = round($IMC, 2);
                //dd($IMC);
            }

        // Obtener la suma de las kcalEjercicio para la fecha más actual
        $sumaKcalEjercicio = LogProgresousuario::where('IDUSUARIO', $idUser)
            ->selectRaw('SUM(kcalEjercicio) as total_kcalEjercicio')
            ->where('action_date', function ($query) use ($idUser) {
                $query->selectRaw('max(action_date)')
                    ->from('log_progresousuario')
                    ->where('IDUSUARIO', $idUser);
            })
            ->value('total_kcalEjercicio');

        // Redondear el resultado a 2 decimales
        $sumaKcalEjercicio = round($sumaKcalEjercicio, 2);
        //dd($sumaKcalEjercicio);

        //$consultaU datos de calorias y numero de ejercicios;
        $consultaU = LogProgresousuario::select('IDUSUARIO',
                    DB::raw('FORMAT(SUM(kcalEjercicio), 0) AS suma_kcalEjercicio'),
                    DB::raw("TIME_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(progress_seconds))), '%H:%i:%s') AS suma_progress_seconds"),
                    DB::raw('COUNT(*) AS NEjercios'))
            ->where('IDUSUARIO', $idusuario->IDUSUARIO)
            ->groupBy('IDUSUARIO')
            ->first();

        //dd($consultaU);
        $fechaActual = Carbon::now('America/Guayaquil');

        // Restamos 7 días para obtener la fecha de inicio de la semana
        $fechaInicioSemana = $fechaActual->copy()->subDays(8);

        $registrosUsuario = LogProgresousuario::select('progress_percentage')
            ->where('IDUSUARIO', $idusuario->IDUSUARIO)
            ->where('progress_dateNow', '>=', $fechaInicioSemana)
            ->where('progress_dateNow', '<=', $fechaActual)
            ->get();

        // Calcular la suma de los porcentajes
        $sumaPorcentajes = $registrosUsuario->sum('progress_percentage');

        // Obtener el número de registros
        $numeroRegistros = $registrosUsuario->count();

        // Calcular el porcentaje total semanal
        $porcentajeTotalSemanal = ($numeroRegistros > 0) ? ($sumaPorcentajes / $numeroRegistros) : 0;

        // Redondear el porcentaje total semanal a dos decimales
        $porcentajeTotalSemanal = round($porcentajeTotalSemanal, 2);

        //dd($porcentajeTotalSemanal);

        $consultaPeso = LogUsuarioUpdatesWH::fromSub(function ($query) use ($idUser) {
                $query->select(
                    'IDUSUARIO',
                    'PESOUSUARIO',
                    DB::raw('ROW_NUMBER() OVER (PARTITION BY IDUSUARIO ORDER BY update_date ASC) AS rn_antiguo'),
                    DB::raw('ROW_NUMBER() OVER (PARTITION BY IDUSUARIO ORDER BY update_date DESC) AS rn_reciente')
                )
                ->where('IDUSUARIO', $idUser)
                ->from('log_usuario_updates_w_h');
            }, 'subquery')
            ->select('IDUSUARIO')
            ->selectRaw('MAX(CASE WHEN rn_reciente = 1 THEN PESOUSUARIO END) AS pesousuario_reciente')
            ->selectRaw('MAX(CASE WHEN rn_antiguo = 1 THEN PESOUSUARIO END) AS pesousuario_antiguo')
            ->selectRaw('MAX(CASE WHEN rn_antiguo = 1 THEN PESOUSUARIO END) - MAX(CASE WHEN rn_reciente = 1 THEN PESOUSUARIO END) AS diferencia_pesousuario')
            ->groupBy('IDUSUARIO')
            ->get();

        //

        $fechaFormateada = $fechaActual->format('l d F Y'); // Ejemplo: "lunes 15 junio 2023"

        // Obtener la suma de progress_seconds para cada fecha de progress_dateNow
        $fechaDiasAtrasG = Carbon::now('America/Guayaquil')->subDays(30);

        // Obtener los registros del usuario dentro del rango de fechas
        $registrosUsuario = LogProgresousuario::where('IDUSUARIO', $idUser)
            ->whereBetween('progress_dateNow', [$fechaDiasAtrasG, $fechaActual])
            ->get();

        // Agrupar los registros por fecha
        $registrosPorFecha = $registrosUsuario->groupBy(function ($registro) {
            return $registro->progress_dateNow->format('Y-m-d');
        });

        $porcentajeTotal = 0;
        $porcentajeDias = [];

        foreach ($registrosPorFecha as $registrosMismoDia) {
            $totalRegistrosMismoDia = $registrosMismoDia->count();
            $sumaProgressPercentageMismoDia = $registrosMismoDia->sum('progress_percentage');

            // Normalizar los porcentajes para que sumen 100%
            $porcentajeDia = ($sumaProgressPercentageMismoDia / $totalRegistrosMismoDia);

            $porcentajeDias[] = [
                'fecha' => $registrosMismoDia->first()->progress_dateNow->format('Y-m-d'),
                'suma' => round($sumaProgressPercentageMismoDia, 2), // Redondear a 2 decimales
                'porcentaje' => round($porcentajeDia, 2), // Redondear a 2 decimales
            ];

        }
        //dd($porcentajeDias);

        $sumaProgressSeconds = LogProgresousuario::where('IDUSUARIO', $idUser)
            ->whereBetween('progress_dateNow', [$fechaDiasAtrasG, $fechaActual])
            ->selectRaw('DATE_FORMAT(progress_dateNow, "%Y-%m-%d") as fecha, TIME_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(progress_seconds))), "%H:%i:%s") AS suma_progress_seconds')
            ->groupBy(DB::raw('DATE_FORMAT(progress_dateNow, "%Y-%m-%d")'))
            ->get();
        //dd($sumaProgressSeconds);

        // Crear un arreglo con todos los días de los últimos 7 días
        $semanaCompleta = [];
        $fechaActual = Carbon::now()->subDays(7);

        for ($i = 0; $i < 7; $i++) {
            $fechaActualStr = $fechaActual->format('Y-m-d');
            $porcentajeDia = 0; // Inicializamos el porcentaje para el día actual

            // Verificar si existe información para la fecha actual en $porcentajeDias
            foreach ($porcentajeDias as $porcentajeDiaItem) {
                if ($porcentajeDiaItem['fecha'] === $fechaActualStr) {
                    $porcentajeDia = round($porcentajeDiaItem['porcentaje'], 2); // Redondear a 2 decimales
                    break;
                }
            }

            // Asignamos los valores al arreglo final $semanaCompleta
            $semanaCompleta[] = [
                'fecha' => $fechaActual->format('l d/m/Y'), // Día de la semana en letras y formato: "lunes 20/06/2023"
                'suma' => round($sumaProgressPercentageMismoDia, 2), // Redondear a 2 decimales
                'porcentaje' => round($porcentajeDia, 2), // Redondear a 2 decimales
            ];

            $fechaActual->addDay(); // Avanzar al siguiente día
        }

        $jsonCreated = [
            'nombreCompleto' => $nombreCompleto,
            'edad' => $edad,
            'datosUsuario' => $datosUsuario,
            'consultaU' => $consultaU,
            'porcentajeTotalSemanal' => $porcentajeTotalSemanal,
            'consultaPeso' => $consultaPeso,
            'fechaFormateada' => $fechaFormateada,
            'sumaKcalEjercicio' => $sumaKcalEjercicio,
            'dataG' => $semanaCompleta,
            'supPorcentaje' => 100,
        ];

        // dd($consultaD);
        return view('dashboard',['jsonCreated'=>$jsonCreated, 'idUser'=>$idUser,'IMC'=>$IMC]);
    }

    public function getPesosSemanas(Request $request)
    {
        $idUser = $request->idUser;

        // Obtener la fecha actual
        $fechaActual = Carbon::now();

        // Restar 7 días a la fecha actual para obtener la fecha límite
        $fechaLimite = $fechaActual->subDays(31);

        $resultadoPesos = LogUsuarioUpdatesWH::select('PESOUSUARIO','update_date')
        ->joinSub(function ($query) use ($idUser) {
            $query->selectRaw('DATE(update_date) AS fecha, MAX(update_date) AS max_date')
                ->from('log_usuario_updates_w_h')
                ->where('IDUSUARIO', $idUser)
                ->groupBy('fecha');
        }, 'subquery', function ($join) {
            $join->on('log_usuario_updates_w_h.update_date', '=', 'subquery.max_date')
                ->whereRaw('DATE(log_usuario_updates_w_h.update_date) = subquery.fecha');
        })
        ->where('IDUSUARIO', $idUser)
        ->whereDate('update_date', '>=', $fechaLimite) // Filtrar por fechas desde la fecha límite
        ->groupBy('PESOUSUARIO','update_date')
        ->orderBy('update_date', 'asc')
        ->get();

        $pesosdias = [];

        foreach ($resultadoPesos as $registro) {
            // Formatear la fecha a 'dd/mm/yy'
            $fechaFormateada = date('d/m/y', strtotime($registro->update_date));

            // Agregar el resultado formateado al arreglo
            $pesosdias[$fechaFormateada] = $registro->PESOUSUARIO;
        }
        //dd($pesosdias);


        return response()->json($pesosdias);
    }

    public function getPesosMeses(Request $request)
    {
        $idUser = $request->idUser;

        $resultadoPesos = LogUsuarioUpdatesWH::select('PESOUSUARIO', 'update_date')
        ->whereIn(DB::raw('DATE(update_date)'), function ($query) use ($idUser) {
            $query->selectRaw('MAX(DATE(update_date))')
                ->from('log_usuario_updates_w_h')
                ->where('IDUSUARIO', $idUser)
                ->groupBy(DB::raw('YEAR(update_date), MONTH(update_date)'));
        })
        ->where('IDUSUARIO', $idUser)
        ->orderBy('update_date', 'asc')
        ->get();

        $pesosMeses = [];
        foreach ($resultadoPesos as $registro) {
            $fecha = Carbon::parse($registro->update_date)->format('M'); // Formato: Mes Año (ejemplo: July)
            $pesosMeses[$fecha] = $registro->PESOUSUARIO;
        }

        $meses = array("Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic");

        // Crear un arreglo final con los valores de $meses y $caloriasMeses
        $datosMeses = [];
        foreach ($meses as $mes) {
            $valor = isset($pesosMeses[$mes]) ? $pesosMeses[$mes] : 0;
            $datosMeses[] = $valor;
        }
        return response()->json($datosMeses);
    }

    public function getCaloriasSemanas(Request $request)
    {
        $idUser = $request->idUser;

        Carbon::setLocale('es'); // Establecer el idioma en español
        Carbon::now()->setTimezone('America/Guayaquil');

        // Obtener la fecha actual
        $fechaActual = Carbon::now('America/Guayaquil');

        // Restar 7 días a la fecha actual para obtener la fecha límite
        $fechaLimite = $fechaActual->subDays(31);
        //DD($fechaLimite);

        $sumaKcalEjercicio = LogProgresousuario::where('IDUSUARIO', $idUser)
            ->select(DB::raw('DATE(progress_dateNow) as fecha, SUM(kcalEjercicio) as total_kcalEjercicio'))
            ->whereDate('progress_dateNow', '>=', $fechaLimite)
            ->groupBy(DB::raw('DATE(progress_dateNow)'))
            ->get();

        $calorias = [];

        foreach ($sumaKcalEjercicio as $registro) {
            // Formatear la fecha a 'dd/mm/yy'
            $fechaFormateada = date('d/m/y', strtotime($registro->fecha));

            // Agregar el resultado formateado al arreglo
            $calorias[$fechaFormateada] = $registro->total_kcalEjercicio;
        }
        //dd($calorias);

        return response()->json($calorias);
    }

    public function getCaloriasMeses(Request $request)
    {
        $idUser = $request->idUser;

        $sumaKcalEjercicio = LogProgresousuario::where('IDUSUARIO', $idUser)
            ->select(DB::raw('MONTH(progress_dateNow) as mes, SUM(kcalEjercicio) as total_kcalEjercicio'))
            ->groupBy(DB::raw('MONTH(progress_dateNow)'))
            ->get();

        $caloriasMeses = [];

        foreach ($sumaKcalEjercicio as $registro) {
            $month = date('F', mktime(0, 0, 0, $registro->mes, 1));
            $totalCalorias = round($registro->total_kcalEjercicio, 2);

            $caloriasMeses[$month] = $totalCalorias;
        }

        $meses = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

        // Crear un arreglo final con los valores de $meses y $caloriasMeses
        $datosMeses = [];
        foreach ($meses as $mes) {
            if (array_key_exists($mes, $caloriasMeses)) {
                $datosMeses[$mes] = $caloriasMeses[$mes];
            } else {
                $datosMeses[$mes] = 0;
            }
        }

        //dd($datosMeses);
        return response()->json($datosMeses);

    }


    function obtenerPrimerNombre($nombreCompleto)
    {
        $primerNombre = strtok($nombreCompleto, ' ');
        return $primerNombre;
    }

    function calcularEdad($fechaNacimiento)
    {
        $fechaActual = new \DateTime();
        $fechaNac = new \DateTime($fechaNacimiento);
        $diferencia = $fechaActual->diff($fechaNac);
        $edad = $diferencia->y;
        return $edad;
    }

}
