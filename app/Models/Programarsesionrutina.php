<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Programarsesionrutina
 * 
 * @property int $IDPROGRAMARSESIONRUTINAS
 * @property int $IDSESION
 * @property int $IDRUTINA
 * 
 * @property Rutina $rutina
 * @property Programarsesion $programarsesion
 *
 * @package App\Models
 */
class Programarsesionrutina extends Model
{
	protected $table = 'programarsesionrutinas';
	protected $primaryKey = 'IDPROGRAMARSESIONRUTINAS';
	public $timestamps = false;

	protected $casts = [
		'IDSESION' => 'int',
		'IDRUTINA' => 'int'
	];

	protected $fillable = [
		'IDSESION',
		'IDRUTINA'
	];

	public function rutina()
	{
		return $this->belongsTo(Rutina::class, 'IDRUTINA');
	}

	public function programarsesion()
	{
		return $this->belongsTo(Programarsesion::class, 'IDSESION');
	}
}
