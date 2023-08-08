<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogUsuarioUpdatesWH
 * 
 * @property int $ID_LOG_USUARIO_UPDATE_W_H
 * @property int|null $IDUSUARIO
 * @property string|null $PESOUSUARIO
 * @property string|null $ALTURAUSUARIO
 * @property Carbon $update_date
 * 
 * @property Usuario|null $usuario
 *
 * @package App\Models
 */
class LogUsuarioUpdatesWH extends Model
{
	protected $table = 'log_usuario_updates_w_h';
	protected $primaryKey = 'ID_LOG_USUARIO_UPDATE_W_H';
	public $timestamps = false;

	protected $casts = [
		'IDUSUARIO' => 'int',
		'update_date' => 'datetime'
	];

	protected $fillable = [
		'IDUSUARIO',
		'PESOUSUARIO',
		'ALTURAUSUARIO',
		'update_date'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'IDUSUARIO');
	}
}
