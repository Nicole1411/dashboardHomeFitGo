<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bookmark
 * 
 * @property int $IDBOOKMARK
 * @property int $IDEJERCICIO
 * @property int $IDUSUARIO
 * @property Carbon $FECHACREACIONBOOKMARK
 * 
 * @property Ejercicio $ejercicio
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Bookmark extends Model
{
	protected $table = 'bookmark';
	protected $primaryKey = 'IDBOOKMARK';
	public $timestamps = false;

	protected $casts = [
		'IDEJERCICIO' => 'int',
		'IDUSUARIO' => 'int',
		'FECHACREACIONBOOKMARK' => 'datetime'
	];

	protected $fillable = [
		'IDEJERCICIO',
		'IDUSUARIO',
		'FECHACREACIONBOOKMARK'
	];

	public function ejercicio()
	{
		return $this->belongsTo(Ejercicio::class, 'IDEJERCICIO');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'IDUSUARIO');
	}
}
