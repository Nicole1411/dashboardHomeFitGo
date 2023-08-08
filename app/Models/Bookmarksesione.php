<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bookmarksesione
 * 
 * @property int $IDBOOKMARKSESIONES
 * @property int $IDSESION
 * @property int $IDUSUARIO
 * @property Carbon $FECHACREACIONBOOKMARKSESIONES
 * 
 * @property Programarsesion $programarsesion
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Bookmarksesione extends Model
{
	protected $table = 'bookmarksesiones';
	protected $primaryKey = 'IDBOOKMARKSESIONES';
	public $timestamps = false;

	protected $casts = [
		'IDSESION' => 'int',
		'IDUSUARIO' => 'int',
		'FECHACREACIONBOOKMARKSESIONES' => 'datetime'
	];

	protected $fillable = [
		'IDSESION',
		'IDUSUARIO',
		'FECHACREACIONBOOKMARKSESIONES'
	];

	public function programarsesion()
	{
		return $this->belongsTo(Programarsesion::class, 'IDSESION');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'IDUSUARIO');
	}
}
