<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Equiporequeridoejercicio
 * 
 * @property int $idEQUIPOREQUERIDOEJERCICIO
 * @property int $IDEJERCICIO
 * @property int $IDEQUIPOREQUERIDO
 * 
 * @property Ejercicio $ejercicio
 * @property Equiporequerido $equiporequerido
 *
 * @package App\Models
 */
class Equiporequeridoejercicio extends Model
{
	protected $table = 'equiporequeridoejercicio';
	protected $primaryKey = 'idEQUIPOREQUERIDOEJERCICIO';
	public $timestamps = false;

	protected $casts = [
		'IDEJERCICIO' => 'int',
		'IDEQUIPOREQUERIDO' => 'int'
	];

	protected $fillable = [
		'IDEJERCICIO',
		'IDEQUIPOREQUERIDO'
	];

	public function ejercicio()
	{
		return $this->belongsTo(Ejercicio::class, 'IDEJERCICIO');
	}

	public function equiporequerido()
	{
		return $this->belongsTo(Equiporequerido::class, 'IDEQUIPOREQUERIDO');
	}
}
