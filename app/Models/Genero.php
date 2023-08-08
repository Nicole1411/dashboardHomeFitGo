<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Genero
 * 
 * @property int $IDGENERO
 * @property string $DESCRIPCIONGENERO
 * 
 * @property Collection|Persona[] $personas
 *
 * @package App\Models
 */
class Genero extends Model
{
	protected $table = 'genero';
	protected $primaryKey = 'IDGENERO';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDGENERO' => 'int'
	];

	protected $fillable = [
		'DESCRIPCIONGENERO'
	];

	public function personas()
	{
		return $this->hasMany(Persona::class, 'IDGENERO');
	}
}
