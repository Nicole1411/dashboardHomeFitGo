<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Progreso
 * 
 * @property int $IDEJERCICIO
 * @property int $IDUSUARIO
 * @property int $IDPROGRESO
 * @property Carbon $FECHAREGISTROPROGRESO
 * @property int $CALIFICACIONPROGRESO
 * @property bool $STATUSPROGRESO
 * 
 * @property Ejercicio $ejercicio
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Progreso extends Model
{
	protected $table = 'progreso';
	protected $primaryKey = 'IDPROGRESO';
	public $timestamps = false;

	protected $casts = [
		'IDEJERCICIO' => 'int',
		'IDUSUARIO' => 'int',
		'FECHAREGISTROPROGRESO' => 'datetime',
		'CALIFICACIONPROGRESO' => 'int',
		'STATUSPROGRESO' => 'bool'
	];

	protected $fillable = [
		'IDEJERCICIO',
		'IDUSUARIO',
		'FECHAREGISTROPROGRESO',
		'CALIFICACIONPROGRESO',
		'STATUSPROGRESO'
	];

	public function ejercicio()
	{
		return $this->belongsTo(Ejercicio::class, 'IDEJERCICIO');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'IDUSUARIO');
	}
}
