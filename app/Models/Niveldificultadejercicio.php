<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Niveldificultadejercicio
 * 
 * @property int $IDNIVELDIFICULTADEJERCICIO
 * @property string $tituloniveldificultadejercicio
 * @property string $DESCRIPCIONNIVELDIFICULTADEJERCICIO
 * 
 * @property Collection|Ejercicio[] $ejercicios
 *
 * @package App\Models
 */
class Niveldificultadejercicio extends Model
{
	protected $table = 'niveldificultadejercicio';
	protected $primaryKey = 'IDNIVELDIFICULTADEJERCICIO';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDNIVELDIFICULTADEJERCICIO' => 'int'
	];

	protected $fillable = [
		'tituloniveldificultadejercicio',
		'DESCRIPCIONNIVELDIFICULTADEJERCICIO'
	];

	public function ejercicios()
	{
		return $this->hasMany(Ejercicio::class, 'IDNIVELDIFICULTADEJERCICIO');
	}
}
