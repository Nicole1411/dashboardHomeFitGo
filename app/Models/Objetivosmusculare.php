<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Objetivosmusculare
 * 
 * @property int $IDOBJETIVOSMUSCULARES
 * @property string $NOMBREOBJETIVOSMUSCULARES
 * @property string $DESCRIPCIONOBJETIVOSMUSCULARES
 * @property int $STATUSOBJETIVOSMUSCULARES
 * @property string|null $OBSERVACIONOBJETIVOSMUSCULARES
 * @property string|null $IMAGENOBJETIVOSMUSCULARES
 * 
 * @property Collection|Ejercicio[] $ejercicios
 * @property Collection|Likeobjetivomusculare[] $likeobjetivomusculares
 *
 * @package App\Models
 */
class Objetivosmusculare extends Model
{
	protected $table = 'objetivosmusculares';
	protected $primaryKey = 'IDOBJETIVOSMUSCULARES';
	public $timestamps = false;

	protected $casts = [
		'STATUSOBJETIVOSMUSCULARES' => 'int'
	];

	protected $fillable = [
		'NOMBREOBJETIVOSMUSCULARES',
		'DESCRIPCIONOBJETIVOSMUSCULARES',
		'STATUSOBJETIVOSMUSCULARES',
		'OBSERVACIONOBJETIVOSMUSCULARES',
		'IMAGENOBJETIVOSMUSCULARES'
	];

	public function ejercicios()
	{
		return $this->hasMany(Ejercicio::class, 'IDOBJETIVOMUSCULAR');
	}

	public function likeobjetivomusculares()
	{
		return $this->hasMany(Likeobjetivomusculare::class, 'IDOBJETIVOSMUSCULARES');
	}
}
