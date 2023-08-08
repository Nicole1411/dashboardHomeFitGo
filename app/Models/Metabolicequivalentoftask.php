<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Metabolicequivalentoftask
 * 
 * @property int $idMetabolicEquivalentOfTask
 * @property float|null $valorMetabolicEquivalentOfTask
 * @property string|null $actividadMetabolicEquivalentOfTask
 * 
 * @property Collection|Ejercicio[] $ejercicios
 *
 * @package App\Models
 */
class Metabolicequivalentoftask extends Model
{
	protected $table = 'metabolicequivalentoftask';
	protected $primaryKey = 'idMetabolicEquivalentOfTask';
	public $timestamps = false;

	protected $casts = [
		'valorMetabolicEquivalentOfTask' => 'float'
	];

	protected $fillable = [
		'valorMetabolicEquivalentOfTask',
		'actividadMetabolicEquivalentOfTask'
	];

	public function ejercicios()
	{
		return $this->hasMany(Ejercicio::class, 'METEJERCICIO');
	}
}
