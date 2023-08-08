<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rutinasdeejercicio
 * 
 * @property int $idRUTINASDEEJERCICIOS
 * @property int $IDEJERCICIO
 * @property int $IDRUTINA
 * 
 * @property Ejercicio $ejercicio
 * @property Rutina $rutina
 *
 * @package App\Models
 */
class Rutinasdeejercicio extends Model
{
	protected $table = 'rutinasdeejercicios';
	protected $primaryKey = 'idRUTINASDEEJERCICIOS';
	public $timestamps = false;

	protected $casts = [
		'IDEJERCICIO' => 'int',
		'IDRUTINA' => 'int'
	];

	protected $fillable = [
		'IDEJERCICIO',
		'IDRUTINA'
	];

	public function ejercicio()
	{
		return $this->belongsTo(Ejercicio::class, 'IDEJERCICIO');
	}

	public function rutina()
	{
		return $this->belongsTo(Rutina::class, 'IDRUTINA');
	}
}
