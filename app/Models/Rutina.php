<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rutina
 * 
 * @property int $IDRUTINA
 * @property int|null $IDENTRENADOR
 * @property int $IDTIPOEJERCICIORUTINA
 * @property int $IDOBJETIVOSPERSONALESRUTINA
 * @property string $NOMBRERUTINA
 * @property string $DESCRIPCIONRUTINA
 * @property Carbon $DURACIONRUTINA
 * @property string $IMAGENRUTINA
 * @property string $OBSERVACIONRUTINA
 * @property Carbon $FECHACREACIONRUTINA
 * @property Carbon|null $FECHAMODIFICACIONRUTINA
 * @property int $USUARIOCREACIONRUTINA
 * @property int|null $USUARIOMODIFICAIONRUTINA
 * @property string|null $COMENTARIOSRUTINA
 * @property bool|null $STATUSRUTINA
 * 
 * @property Persona|null $persona
 * @property Objetivospersonale $objetivospersonale
 * @property Tipoejercicio $tipoejercicio
 * @property Collection|Bookmarkrutina[] $bookmarkrutinas
 * @property Collection|Programarsesion[] $programarsesions
 * @property Collection|Progresousuario[] $progresousuarios
 * @property Collection|Ejercicio[] $ejercicios
 *
 * @package App\Models
 */
class Rutina extends Model
{
	protected $table = 'rutina';
	protected $primaryKey = 'IDRUTINA';
	public $timestamps = false;

	protected $casts = [
		'IDENTRENADOR' => 'int',
		'IDTIPOEJERCICIORUTINA' => 'int',
		'IDOBJETIVOSPERSONALESRUTINA' => 'int',
		'DURACIONRUTINA' => 'datetime',
		'FECHACREACIONRUTINA' => 'datetime',
		'FECHAMODIFICACIONRUTINA' => 'datetime',
		'USUARIOCREACIONRUTINA' => 'int',
		'USUARIOMODIFICAIONRUTINA' => 'int',
		'STATUSRUTINA' => 'bool'
	];

	protected $fillable = [
		'IDENTRENADOR',
		'IDTIPOEJERCICIORUTINA',
		'IDOBJETIVOSPERSONALESRUTINA',
		'NOMBRERUTINA',
		'DESCRIPCIONRUTINA',
		'DURACIONRUTINA',
		'IMAGENRUTINA',
		'OBSERVACIONRUTINA',
		'FECHACREACIONRUTINA',
		'FECHAMODIFICACIONRUTINA',
		'USUARIOCREACIONRUTINA',
		'USUARIOMODIFICAIONRUTINA',
		'COMENTARIOSRUTINA',
		'STATUSRUTINA'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'USUARIOMODIFICAIONRUTINA');
	}

	public function objetivospersonale()
	{
		return $this->belongsTo(Objetivospersonale::class, 'IDOBJETIVOSPERSONALESRUTINA');
	}

	public function tipoejercicio()
	{
		return $this->belongsTo(Tipoejercicio::class, 'IDTIPOEJERCICIORUTINA');
	}

	public function bookmarkrutinas()
	{
		return $this->hasMany(Bookmarkrutina::class, 'IDRUTINA');
	}

	public function programarsesions()
	{
		return $this->belongsToMany(Programarsesion::class, 'programarsesionrutinas', 'IDRUTINA', 'IDSESION')
					->withPivot('IDPROGRAMARSESIONRUTINAS');
	}

	public function progresousuarios()
	{
		return $this->hasMany(Progresousuario::class, 'IDRUTINA');
	}

	public function ejercicios()
	{
		return $this->belongsToMany(Ejercicio::class, 'rutinasdeejercicios', 'IDRUTINA', 'IDEJERCICIO')
					->withPivot('idRUTINASDEEJERCICIOS');
	}
}
