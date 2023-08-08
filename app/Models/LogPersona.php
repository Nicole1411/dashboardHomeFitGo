<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogPersona
 * 
 * @property int $ID_LOG
 * @property int $ID_PERSONA
 * @property Carbon $FECHA_MODIFICACION
 * @property string|null $CAMPO_MODIFICADO
 * @property string|null $VALOR_ANTERIOR
 * @property string|null $VALOR_ACTUAL
 * @property int|null $USUARIO_MODIFICACION
 * 
 * @property Persona $persona
 *
 * @package App\Models
 */
class LogPersona extends Model
{
	protected $table = 'log_persona';
	protected $primaryKey = 'ID_LOG';
	public $timestamps = false;

	protected $casts = [
		'ID_PERSONA' => 'int',
		'FECHA_MODIFICACION' => 'datetime',
		'USUARIO_MODIFICACION' => 'int'
	];

	protected $fillable = [
		'ID_PERSONA',
		'FECHA_MODIFICACION',
		'CAMPO_MODIFICADO',
		'VALOR_ANTERIOR',
		'VALOR_ACTUAL',
		'USUARIO_MODIFICACION'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'ID_PERSONA');
	}
}
