<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contratacion
 * 
 * @property int $IDCONTRATACION
 * @property int $IDENTRENADOR
 * @property int $IDUSUARIO
 * @property int $MESESCONTRATACION
 * @property Carbon $FECHADECONTRATACION
 * 
 * @property Entrenador $entrenador
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Contratacion extends Model
{
	protected $table = 'contratacion';
	protected $primaryKey = 'IDCONTRATACION';
	public $timestamps = false;

	protected $casts = [
		'IDENTRENADOR' => 'int',
		'IDUSUARIO' => 'int',
		'MESESCONTRATACION' => 'int',
		'FECHADECONTRATACION' => 'datetime'
	];

	protected $fillable = [
		'IDENTRENADOR',
		'IDUSUARIO',
		'MESESCONTRATACION',
		'FECHADECONTRATACION'
	];

	public function entrenador()
	{
		return $this->belongsTo(Entrenador::class, 'IDENTRENADOR');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'IDUSUARIO');
	}
}
