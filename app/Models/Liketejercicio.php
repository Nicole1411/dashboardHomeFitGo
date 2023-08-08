<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Liketejercicio
 * 
 * @property int $IDLIKETEJERCICIO
 * @property int $IDTIPOEJERCICIO
 * @property int $IDUSUARIO
 * @property Carbon $FECHACREACIONLIKEEJERCICIO
 * 
 * @property Tipoejercicio $tipoejercicio
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Liketejercicio extends Model
{
	protected $table = 'liketejercicio';
	protected $primaryKey = 'IDLIKETEJERCICIO';
	public $timestamps = false;

	protected $casts = [
		'IDTIPOEJERCICIO' => 'int',
		'IDUSUARIO' => 'int',
		'FECHACREACIONLIKEEJERCICIO' => 'datetime'
	];

	protected $fillable = [
		'IDTIPOEJERCICIO',
		'IDUSUARIO',
		'FECHACREACIONLIKEEJERCICIO'
	];

	public function tipoejercicio()
	{
		return $this->belongsTo(Tipoejercicio::class, 'IDTIPOEJERCICIO');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'IDUSUARIO');
	}
}
