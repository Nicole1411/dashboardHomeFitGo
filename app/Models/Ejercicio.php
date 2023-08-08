<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ejercicio
 * 
 * @property int $IDEJERCICIO
 * @property int $IDMULTIMEDIA
 * @property int $IDTIPOEJERCICIO
 * @property int $IDNIVELDIFICULTADEJERCICIO
 * @property int|null $IDENTRENADOR
 * @property int $IDOBJETIVOMUSCULAR
 * @property string $NOMBREEJERCICIO
 * @property string $DESCRIPCIONEJERCICIO
 * @property string $INTRUCCIONESEJERCICIO
 * @property string|null $PESOLEVANTADOEJERCICIO
 * @property string $REPETICIONESEJERCICIO
 * @property int|null $METEJERCICIO
 * @property string|null $VARIACIONESMODIFICACIONEJERCICIOPROGRESO
 * @property string|null $OBSERVACIONESEJERCICIO
 * @property Carbon|null $FECHACREACIONEJERCICIO
 * @property Carbon|null $FECHAMODIFICACIONEJERCICIO
 * @property int|null $USUARIOCREACIONEJERCICIO
 * @property int|null $USUARIOMODIFICAICONEJERCICIO
 * @property bool|null $ESTADOEJERCICIO
 * 
 * @property Multimedia $multimedia
 * @property Niveldificultadejercicio $niveldificultadejercicio
 * @property Objetivosmusculare $objetivosmusculare
 * @property Tipoejercicio $tipoejercicio
 * @property Persona|null $persona
 * @property Metabolicequivalentoftask|null $metabolicequivalentoftask
 * @property Collection|Bookmark[] $bookmarks
 * @property Collection|Equiporequerido[] $equiporequeridos
 * @property Collection|LogEjercicio[] $log_ejercicios
 * @property Collection|Progreso[] $progresos
 * @property Collection|Progresousuario[] $progresousuarios
 * @property Collection|Rutina[] $rutinas
 *
 * @package App\Models
 */
class Ejercicio extends Model
{
	protected $table = 'ejercicio';
	protected $primaryKey = 'IDEJERCICIO';
	public $timestamps = false;

	protected $casts = [
		'IDMULTIMEDIA' => 'int',
		'IDTIPOEJERCICIO' => 'int',
		'IDNIVELDIFICULTADEJERCICIO' => 'int',
		'IDENTRENADOR' => 'int',
		'IDOBJETIVOMUSCULAR' => 'int',
		'METEJERCICIO' => 'int',
		'FECHACREACIONEJERCICIO' => 'datetime',
		'FECHAMODIFICACIONEJERCICIO' => 'datetime',
		'USUARIOCREACIONEJERCICIO' => 'int',
		'USUARIOMODIFICAICONEJERCICIO' => 'int',
		'ESTADOEJERCICIO' => 'bool'
	];

	protected $fillable = [
		'IDMULTIMEDIA',
		'IDTIPOEJERCICIO',
		'IDNIVELDIFICULTADEJERCICIO',
		'IDENTRENADOR',
		'IDOBJETIVOMUSCULAR',
		'NOMBREEJERCICIO',
		'DESCRIPCIONEJERCICIO',
		'INTRUCCIONESEJERCICIO',
		'PESOLEVANTADOEJERCICIO',
		'REPETICIONESEJERCICIO',
		'METEJERCICIO',
		'VARIACIONESMODIFICACIONEJERCICIOPROGRESO',
		'OBSERVACIONESEJERCICIO',
		'FECHACREACIONEJERCICIO',
		'FECHAMODIFICACIONEJERCICIO',
		'USUARIOCREACIONEJERCICIO',
		'USUARIOMODIFICAICONEJERCICIO',
		'ESTADOEJERCICIO'
	];

	public function multimedia()
	{
		return $this->belongsTo(Multimedia::class, 'IDMULTIMEDIA');
	}

	public function niveldificultadejercicio()
	{
		return $this->belongsTo(Niveldificultadejercicio::class, 'IDNIVELDIFICULTADEJERCICIO');
	}

	public function objetivosmusculare()
	{
		return $this->belongsTo(Objetivosmusculare::class, 'IDOBJETIVOMUSCULAR');
	}

	public function tipoejercicio()
	{
		return $this->belongsTo(Tipoejercicio::class, 'IDTIPOEJERCICIO');
	}

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'USUARIOMODIFICAICONEJERCICIO');
	}

	public function metabolicequivalentoftask()
	{
		return $this->belongsTo(Metabolicequivalentoftask::class, 'METEJERCICIO');
	}

	public function bookmarks()
	{
		return $this->hasMany(Bookmark::class, 'IDEJERCICIO');
	}

	public function equiporequeridos()
	{
		return $this->belongsToMany(Equiporequerido::class, 'equiporequeridoejercicio', 'IDEJERCICIO', 'IDEQUIPOREQUERIDO')
					->withPivot('idEQUIPOREQUERIDOEJERCICIO');
	}

	public function log_ejercicios()
	{
		return $this->hasMany(LogEjercicio::class, 'ID_EJERCICIO');
	}

	public function progresos()
	{
		return $this->hasMany(Progreso::class, 'IDEJERCICIO');
	}

	public function progresousuarios()
	{
		return $this->hasMany(Progresousuario::class, 'IDEJERCICIO');
	}

	public function rutinas()
	{
		return $this->belongsToMany(Rutina::class, 'rutinasdeejercicios', 'IDEJERCICIO', 'IDRUTINA')
					->withPivot('idRUTINASDEEJERCICIOS');
	}
}
