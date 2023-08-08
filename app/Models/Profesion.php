<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Profesion
 * 
 * @property int $IDPROFESION
 * @property string $DESCRIPCIONPROFESION
 * 
 * @property Collection|Programarsesion[] $programarsesions
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Profesion extends Model
{
	protected $table = 'profesion';
	protected $primaryKey = 'IDPROFESION';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDPROFESION' => 'int'
	];

	protected $fillable = [
		'DESCRIPCIONPROFESION'
	];

	public function programarsesions()
	{
		return $this->hasMany(Programarsesion::class, 'IDPROFESIONSESION');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'IDPROFESION');
	}
}
