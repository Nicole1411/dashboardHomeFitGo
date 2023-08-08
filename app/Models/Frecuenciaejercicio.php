<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Frecuenciaejercicio
 * 
 * @property int $IDFRECUENCIA
 * @property string|null $TituloFrecuenciaEjercicio
 * @property string|null $DESCRIPCIONFRECUENCIA
 * @property string|null $BackgroundImageButton
 * @property string|null $BackgroundButton
 * @property string|null $BackgroundImage
 * 
 * @property Collection|Programarsesion[] $programarsesions
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Frecuenciaejercicio extends Model
{
	protected $table = 'frecuenciaejercicio';
	protected $primaryKey = 'IDFRECUENCIA';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDFRECUENCIA' => 'int'
	];

	protected $fillable = [
		'TituloFrecuenciaEjercicio',
		'DESCRIPCIONFRECUENCIA',
		'BackgroundImageButton',
		'BackgroundButton',
		'BackgroundImage'
	];

	public function programarsesions()
	{
		return $this->hasMany(Programarsesion::class, 'IDFRECUENCIASESION');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'IDFRECUENCIA');
	}
}
