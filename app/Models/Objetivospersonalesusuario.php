<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Objetivospersonalesusuario
 * 
 * @property int $IDOBJETIVOSPERSONALESUSUARIO
 * @property int $IDUSUARIO
 * @property int $IDOBJETIVOSPERSONALES
 * 
 * @property Objetivospersonale $objetivospersonale
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Objetivospersonalesusuario extends Model
{
	protected $table = 'objetivospersonalesusuario';
	protected $primaryKey = 'IDOBJETIVOSPERSONALESUSUARIO';
	public $timestamps = false;

	protected $casts = [
		'IDUSUARIO' => 'int',
		'IDOBJETIVOSPERSONALES' => 'int'
	];

	protected $fillable = [
		'IDUSUARIO',
		'IDOBJETIVOSPERSONALES'
	];

	public function objetivospersonale()
	{
		return $this->belongsTo(Objetivospersonale::class, 'IDOBJETIVOSPERSONALES');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'IDUSUARIO');
	}
}
