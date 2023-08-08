<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipoejercicio
 * 
 * @property int $IDTIPOEJERCICIO
 * @property string $NOMBRETIPOEJERCICIO
 * @property string $DESCRIPCIONTIPOEJERCICIO
 * @property int $STATUSTIPOEJERCICIO
 * @property string|null $OBSERVACIONTIPOEJERCICIO
 * @property string $IMAGETIPOEJERCICIO
 * 
 * @property Collection|Ejercicio[] $ejercicios
 * @property Collection|Liketejercicio[] $liketejercicios
 * @property Collection|Rutina[] $rutinas
 *
 * @package App\Models
 */
class Tipoejercicio extends Model
{
	protected $table = 'tipoejercicio';
	protected $primaryKey = 'IDTIPOEJERCICIO';
	public $timestamps = false;

	protected $casts = [
		'STATUSTIPOEJERCICIO' => 'int'
	];

	protected $fillable = [
		'NOMBRETIPOEJERCICIO',
		'DESCRIPCIONTIPOEJERCICIO',
		'STATUSTIPOEJERCICIO',
		'OBSERVACIONTIPOEJERCICIO',
		'IMAGETIPOEJERCICIO'
	];

	public function ejercicios()
	{
		return $this->hasMany(Ejercicio::class, 'IDTIPOEJERCICIO');
	}

	public function liketejercicios()
	{
		return $this->hasMany(Liketejercicio::class, 'IDTIPOEJERCICIO');
	}

	public function rutinas()
	{
		return $this->hasMany(Rutina::class, 'IDTIPOEJERCICIORUTINA');
	}
}
