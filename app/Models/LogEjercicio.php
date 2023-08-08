<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogEjercicio
 * 
 * @property int $ID_LOG_EJERCICIO
 * @property int $ID_EJERCICIO
 * @property Carbon $FECHA_MODIFICACION
 * @property string|null $CAMPO_MODIFICADO
 * @property string|null $VALOR_ANTERIOR
 * @property string|null $VALOR_ACTUAL
 * @property int|null $USUARIO_MODIFICACION_EJERCICIO
 * 
 * @property Persona|null $persona
 * @property Ejercicio $ejercicio
 *
 * @package App\Models
 */
class LogEjercicio extends Model
{
	protected $table = 'log_ejercicio';
	protected $primaryKey = 'ID_LOG_EJERCICIO';
	public $timestamps = false;

	protected $casts = [
		'ID_EJERCICIO' => 'int',
		'FECHA_MODIFICACION' => 'datetime',
		'USUARIO_MODIFICACION_EJERCICIO' => 'int'
	];

	protected $fillable = [
		'ID_EJERCICIO',
		'FECHA_MODIFICACION',
		'CAMPO_MODIFICADO',
		'VALOR_ANTERIOR',
		'VALOR_ACTUAL',
		'USUARIO_MODIFICACION_EJERCICIO'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'USUARIO_MODIFICACION_EJERCICIO');
	}

	public function ejercicio()
	{
		return $this->belongsTo(Ejercicio::class, 'ID_EJERCICIO');
	}
}
