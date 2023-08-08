<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Equiporequerido
 * 
 * @property int $IDEQUIPOREQUERIDO
 * @property string $NOMBREEQUIPOREQUERIDO
 * @property string|null $OBSERVACIONEQUIPOREQUERIDO
 * @property string $IMAGENEQUIPOREQUERIDO
 * @property int $STATUSEQUIPOREQUERIDO
 * 
 * @property Collection|Ejercicio[] $ejercicios
 *
 * @package App\Models
 */
class Equiporequerido extends Model
{
	protected $table = 'equiporequerido';
	protected $primaryKey = 'IDEQUIPOREQUERIDO';
	public $timestamps = false;

	protected $casts = [
		'STATUSEQUIPOREQUERIDO' => 'int'
	];

	protected $fillable = [
		'NOMBREEQUIPOREQUERIDO',
		'OBSERVACIONEQUIPOREQUERIDO',
		'IMAGENEQUIPOREQUERIDO',
		'STATUSEQUIPOREQUERIDO'
	];

	public function ejercicios()
	{
		return $this->belongsToMany(Ejercicio::class, 'equiporequeridoejercicio', 'IDEQUIPOREQUERIDO', 'IDEJERCICIO')
					->withPivot('idEQUIPOREQUERIDOEJERCICIO');
	}
}
