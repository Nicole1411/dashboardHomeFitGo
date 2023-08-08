<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Likeobjetivomusculare
 * 
 * @property int $IDLIKEOBJETIVOMUSCULARES
 * @property int $IDOBJETIVOSMUSCULARES
 * @property int $IDUSUARIO
 * @property Carbon $FECHACREACIONLIKEOBJETIVOMUSCULARES
 * 
 * @property Objetivosmusculare $objetivosmusculare
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Likeobjetivomusculare extends Model
{
	protected $table = 'likeobjetivomusculares';
	protected $primaryKey = 'IDLIKEOBJETIVOMUSCULARES';
	public $timestamps = false;

	protected $casts = [
		'IDOBJETIVOSMUSCULARES' => 'int',
		'IDUSUARIO' => 'int',
		'FECHACREACIONLIKEOBJETIVOMUSCULARES' => 'datetime'
	];

	protected $fillable = [
		'IDOBJETIVOSMUSCULARES',
		'IDUSUARIO',
		'FECHACREACIONLIKEOBJETIVOMUSCULARES'
	];

	public function objetivosmusculare()
	{
		return $this->belongsTo(Objetivosmusculare::class, 'IDOBJETIVOSMUSCULARES');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'IDUSUARIO');
	}
}
