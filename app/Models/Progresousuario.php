<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Progresousuario
 * 
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
 * 
 * @property Ejercicio|null $ejercicio
 * @property Rutina|null $rutina
 * @property Programarsesion|null $programarsesion
 * @property Usuario $usuario
 * @property Collection|LogProgresousuario[] $log_progresousuarios
 *
 * @package App\Models
 */
class Progresousuario extends Model
{
	protected $table = 'progresousuario';
	protected $primaryKey = 'IDPROGRESOUSUARIO';
	public $timestamps = false;

	protected $casts = [
		'IDEJERCICIO' => 'int',
		'IDSESION' => 'int',
		'IDRUTINA' => 'int',
		'IDUSUARIO' => 'int',
		'progress_percentage' => 'float',
		'progress_numeroEjercicio' => 'int',
		'progress_show' => 'bool',
		'progress_dateNow' => 'datetime',
		'progress_numeroRutina' => 'int'
	];

	protected $fillable = [
		'IDEJERCICIO',
		'IDSESION',
		'IDRUTINA',
		'IDUSUARIO',
		'progress_seconds',
		'progress_percentage',
		'progress_numeroEjercicio',
		'progress_show',
		'progress_dateNow',
		'progress_numeroRutina'
	];

	public function ejercicio()
	{
		return $this->belongsTo(Ejercicio::class, 'IDEJERCICIO');
	}

	public function rutina()
	{
		return $this->belongsTo(Rutina::class, 'IDRUTINA');
	}

	public function programarsesion()
	{
		return $this->belongsTo(Programarsesion::class, 'IDSESION');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'IDUSUARIO');
	}

	public function log_progresousuarios()
	{
		return $this->hasMany(LogProgresousuario::class, 'IDPROGRESOUSUARIO');
	}
}
