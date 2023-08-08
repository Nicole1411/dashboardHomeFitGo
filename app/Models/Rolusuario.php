<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rolusuario
 * 
 * @property int $IDROLUSUARIO
 * @property string $DESCRIPCIONROLUSUARIO
 * 
 * @property Collection|Persona[] $personas
 *
 * @package App\Models
 */
class Rolusuario extends Model
{
	protected $table = 'rolusuario';
	protected $primaryKey = 'IDROLUSUARIO';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDROLUSUARIO' => 'int'
	];

	protected $fillable = [
		'DESCRIPCIONROLUSUARIO'
	];

	public function personas()
	{
		return $this->hasMany(Persona::class, 'IDROLUSUARIO');
	}
}
