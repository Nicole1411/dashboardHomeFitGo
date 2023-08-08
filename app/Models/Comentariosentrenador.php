<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comentariosentrenador
 * 
 * @property int $IDCOMENTARIOENTRENADOR
 * @property int $IDENTRENADOR
 * @property int $IDUSUARIO
 * @property Carbon $FECHACREACIONCOMENTARIOENTRENADOR
 * @property int $PUNTUACIONCOMENTARIOENTRENADOR
 * @property string $OPINIONCOMENTARIOENTRENADOR
 * 
 * @property Entrenador $entrenador
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Comentariosentrenador extends Model
{
	protected $table = 'comentariosentrenador';
	protected $primaryKey = 'IDCOMENTARIOENTRENADOR';
	public $timestamps = false;

	protected $casts = [
		'IDENTRENADOR' => 'int',
		'IDUSUARIO' => 'int',
		'FECHACREACIONCOMENTARIOENTRENADOR' => 'datetime',
		'PUNTUACIONCOMENTARIOENTRENADOR' => 'int'
	];

	protected $fillable = [
		'IDENTRENADOR',
		'IDUSUARIO',
		'FECHACREACIONCOMENTARIOENTRENADOR',
		'PUNTUACIONCOMENTARIOENTRENADOR',
		'OPINIONCOMENTARIOENTRENADOR'
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
