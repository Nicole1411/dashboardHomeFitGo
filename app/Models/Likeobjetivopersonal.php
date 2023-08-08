<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Likeobjetivopersonal
 * 
 * @property int $IDLIKEOBJETIVOPERSONAL
 * @property int $IDOBJETIVOSPERSONALES
 * @property int $IDUSUARIO
 * @property Carbon $FECHACREACIONLIKEOBJETIVOPERSONAL
 * 
 * @property Objetivospersonale $objetivospersonale
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Likeobjetivopersonal extends Model
{
	protected $table = 'likeobjetivopersonal';
	protected $primaryKey = 'IDLIKEOBJETIVOPERSONAL';
	public $timestamps = false;

	protected $casts = [
		'IDOBJETIVOSPERSONALES' => 'int',
		'IDUSUARIO' => 'int',
		'FECHACREACIONLIKEOBJETIVOPERSONAL' => 'datetime'
	];

	protected $fillable = [
		'IDOBJETIVOSPERSONALES',
		'IDUSUARIO',
		'FECHACREACIONLIKEOBJETIVOPERSONAL'
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
