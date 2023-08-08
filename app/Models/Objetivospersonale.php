<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Objetivospersonale
 * 
 * @property int $IDOBJETIVOSPERSONALES
 * @property string $DESCRIPCIONOBJETIVOSPERSONALES
 * @property string|null $BackgroundButton
 * @property string|null $BackgroundImage
 * @property string $checkmarkcolor
 * @property string|null $IMAGEOBJETIVOSPERSONALES
 * @property string|null $OBSERVACIONOBJETIVOSPERSONALES
 * 
 * @property Collection|Likeobjetivopersonal[] $likeobjetivopersonals
 * @property Collection|Usuario[] $usuarios
 * @property Collection|Programarsesion[] $programarsesions
 * @property Collection|Rutina[] $rutinas
 *
 * @package App\Models
 */
class Objetivospersonale extends Model
{
	protected $table = 'objetivospersonales';
	protected $primaryKey = 'IDOBJETIVOSPERSONALES';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDOBJETIVOSPERSONALES' => 'int'
	];

	protected $fillable = [
		'DESCRIPCIONOBJETIVOSPERSONALES',
		'BackgroundButton',
		'BackgroundImage',
		'checkmarkcolor',
		'IMAGEOBJETIVOSPERSONALES',
		'OBSERVACIONOBJETIVOSPERSONALES'
	];

	public function likeobjetivopersonals()
	{
		return $this->hasMany(Likeobjetivopersonal::class, 'IDOBJETIVOSPERSONALES');
	}

	public function usuarios()
	{
		return $this->belongsToMany(Usuario::class, 'objetivospersonalesusuario', 'IDOBJETIVOSPERSONALES', 'IDUSUARIO')
					->withPivot('IDOBJETIVOSPERSONALESUSUARIO');
	}

	public function programarsesions()
	{
		return $this->hasMany(Programarsesion::class, 'IDOBJETIVOSPERSONALESSESION');
	}

	public function rutinas()
	{
		return $this->hasMany(Rutina::class, 'IDOBJETIVOSPERSONALESRUTINA');
	}
}
