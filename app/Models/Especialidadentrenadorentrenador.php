<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Especialidadentrenadorentrenador
 * 
 * @property int $idespecialidadentrenadorentrenador
 * @property int $IDENTRENADOR
 * @property int $idespecialidadentrenador
 * 
 * @property Entrenador $entrenador
 * @property Especialidadentrenador $especialidadentrenador
 *
 * @package App\Models
 */
class Especialidadentrenadorentrenador extends Model
{
	protected $table = 'especialidadentrenadorentrenador';
	protected $primaryKey = 'idespecialidadentrenadorentrenador';
	public $timestamps = false;

	protected $casts = [
		'IDENTRENADOR' => 'int',
		'idespecialidadentrenador' => 'int'
	];

	protected $fillable = [
		'IDENTRENADOR',
		'idespecialidadentrenador'
	];

	public function entrenador()
	{
		return $this->belongsTo(Entrenador::class, 'IDENTRENADOR');
	}

	public function especialidadentrenador()
	{
		return $this->belongsTo(Especialidadentrenador::class, 'idespecialidadentrenador');
	}
}
