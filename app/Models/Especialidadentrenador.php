<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Especialidadentrenador
 * 
 * @property int $idespecialidadentrenador
 * @property string|null $tituloESPECIALIDADENTRENADOR
 * @property string|null $imagenESPECIALIDADENTRENADOR
 * 
 * @property Collection|Entrenador[] $entrenadors
 *
 * @package App\Models
 */
class Especialidadentrenador extends Model
{
	protected $table = 'especialidadentrenador';
	protected $primaryKey = 'idespecialidadentrenador';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idespecialidadentrenador' => 'int'
	];

	protected $fillable = [
		'tituloESPECIALIDADENTRENADOR',
		'imagenESPECIALIDADENTRENADOR'
	];

	public function entrenadors()
	{
		return $this->belongsToMany(Entrenador::class, 'especialidadentrenadorentrenador', 'idespecialidadentrenador', 'IDENTRENADOR')
					->withPivot('idespecialidadentrenadorentrenador');
	}
}
