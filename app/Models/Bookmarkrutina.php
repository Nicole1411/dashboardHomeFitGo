<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bookmarkrutina
 * 
 * @property int $IDBOOKMARKRUTINAS
 * @property int $IDRUTINA
 * @property int $IDUSUARIO
 * @property Carbon $FECHACREACIONBOOKMARKRUTINAS
 * 
 * @property Rutina $rutina
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Bookmarkrutina extends Model
{
	protected $table = 'bookmarkrutinas';
	protected $primaryKey = 'IDBOOKMARKRUTINAS';
	public $timestamps = false;

	protected $casts = [
		'IDRUTINA' => 'int',
		'IDUSUARIO' => 'int',
		'FECHACREACIONBOOKMARKRUTINAS' => 'datetime'
	];

	protected $fillable = [
		'IDRUTINA',
		'IDUSUARIO',
		'FECHACREACIONBOOKMARKRUTINAS'
	];

	public function rutina()
	{
		return $this->belongsTo(Rutina::class, 'IDRUTINA');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'IDUSUARIO');
	}
}
