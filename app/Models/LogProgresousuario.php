<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogProgresousuario
 * 
 * @property int $IDLOGPROGRESOUSUARIO
 * @property int $IDPROGRESOUSUARIO
 * @property int|null $IDEJERCICIO
 * @property int|null $IDSESION
 * @property int|null $IDRUTINA
 * @property int $IDUSUARIO
 * @property string|null $progress_seconds
 * @property float $progress_percentage
 * @property int|null $progress_numeroEjercicio
 * @property bool $progress_show
 * @property Carbon $progress_dateNow
 * @property int|null $progress_numeroRutina
 * @property float|null $kcalEjercicio
 * @property string $action_type
 * @property Carbon $action_date
 * 
 * @property Progresousuario $progresousuario
 *
 * @package App\Models
 */
class LogProgresousuario extends Model
{
	protected $table = 'log_progresousuario';
	protected $primaryKey = 'IDLOGPROGRESOUSUARIO';
	public $timestamps = false;

	protected $casts = [
		'IDPROGRESOUSUARIO' => 'int',
		'IDEJERCICIO' => 'int',
		'IDSESION' => 'int',
		'IDRUTINA' => 'int',
		'IDUSUARIO' => 'int',
		'progress_percentage' => 'float',
		'progress_numeroEjercicio' => 'int',
		'progress_show' => 'bool',
		'progress_dateNow' => 'datetime',
		'progress_numeroRutina' => 'int',
		'kcalEjercicio' => 'float',
		'action_date' => 'datetime'
	];

	protected $fillable = [
		'IDPROGRESOUSUARIO',
		'IDEJERCICIO',
		'IDSESION',
		'IDRUTINA',
		'IDUSUARIO',
		'progress_seconds',
		'progress_percentage',
		'progress_numeroEjercicio',
		'progress_show',
		'progress_dateNow',
		'progress_numeroRutina',
		'kcalEjercicio',
		'action_type',
		'action_date'
	];

	public function progresousuario()
	{
		return $this->belongsTo(Progresousuario::class, 'IDPROGRESOUSUARIO');
	}
}
