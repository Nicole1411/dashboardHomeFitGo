<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Entrenador
 * 
 * @property int $IDPERSONA
 * @property int $IDENTRENADOR
 * @property string|null $EXPERIENCIAENTRENADOR
 * @property string|null $DESCRIPCIONENTRENADOR
 * @property float|null $TARIFASENTRENADOR
 * @property bool|null $ACTIVACIONENTRENADOR
 * @property string|null $CERTIFICACIONESENTRENADOR
 * 
 * @property Persona $persona
 * @property Collection|Comentariosentrenador[] $comentariosentrenadors
 * @property Collection|Contratacion[] $contratacions
 * @property Collection|Especialidadentrenadorentrenador[] $especialidadentrenadorentrenadors
 *
 * @package App\Models
 */
class Entrenador extends Model
{
	protected $table = 'entrenador';
	protected $primaryKey = 'IDENTRENADOR';
	public $timestamps = false;

	protected $casts = [
		'IDPERSONA' => 'int',
		'TARIFASENTRENADOR' => 'float',
		'ACTIVACIONENTRENADOR' => 'bool'
	];

	protected $fillable = [
		'IDPERSONA',
		'EXPERIENCIAENTRENADOR',
		'DESCRIPCIONENTRENADOR',
		'TARIFASENTRENADOR',
		'ACTIVACIONENTRENADOR',
		'CERTIFICACIONESENTRENADOR'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'IDPERSONA');
	}

	public function comentariosentrenadors()
	{
		return $this->hasMany(Comentariosentrenador::class, 'IDENTRENADOR');
	}

	public function contratacions()
	{
		return $this->hasMany(Contratacion::class, 'IDENTRENADOR');
	}

	public function especialidadentrenadorentrenadors()
	{
		return $this->hasMany(Especialidadentrenadorentrenador::class, 'IDENTRENADOR');
	}
}
