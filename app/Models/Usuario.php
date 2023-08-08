<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $IDPERSONA
 * @property int $IDUSUARIO
 * @property int $IDPROFESION
 * @property int $IDFRECUENCIA
 * @property string $PESOUSUARIO
 * @property string $ALTURAUSUARIO
 * @property string|null $MEDIDASCORPORALESUSUARIO
 * @property string $NOTIFICACIONUSUARIO
 * 
 * @property Frecuenciaejercicio $frecuenciaejercicio
 * @property Persona $persona
 * @property Profesion $profesion
 * @property Collection|Bookmark[] $bookmarks
 * @property Collection|Bookmarkrutina[] $bookmarkrutinas
 * @property Collection|Bookmarksesione[] $bookmarksesiones
 * @property Collection|Comentariosentrenador[] $comentariosentrenadors
 * @property Collection|Contratacion[] $contratacions
 * @property Collection|Likeobjetivomusculare[] $likeobjetivomusculares
 * @property Collection|Likeobjetivopersonal[] $likeobjetivopersonals
 * @property Collection|Liketejercicio[] $liketejercicios
 * @property Collection|LogUsuarioUpdatesWH[] $log_usuario_updates_w_hs
 * @property Collection|Objetivospersonale[] $objetivospersonales
 * @property Collection|Progreso[] $progresos
 * @property Collection|Progresousuario[] $progresousuarios
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	public $timestamps = false;

	protected $casts = [
		'IDPERSONA' => 'int',
		'IDPROFESION' => 'int',
		'IDFRECUENCIA' => 'int'
	];

	protected $fillable = [
		'IDPROFESION',
		'IDFRECUENCIA',
		'PESOUSUARIO',
		'ALTURAUSUARIO',
		'MEDIDASCORPORALESUSUARIO',
		'NOTIFICACIONUSUARIO'
	];

	public function frecuenciaejercicio()
	{
		return $this->belongsTo(Frecuenciaejercicio::class, 'IDFRECUENCIA');
	}

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'IDPERSONA');
	}

	public function profesion()
	{
		return $this->belongsTo(Profesion::class, 'IDPROFESION');
	}

	public function bookmarks()
	{
		return $this->hasMany(Bookmark::class, 'IDUSUARIO');
	}

	public function bookmarkrutinas()
	{
		return $this->hasMany(Bookmarkrutina::class, 'IDUSUARIO');
	}

	public function bookmarksesiones()
	{
		return $this->hasMany(Bookmarksesione::class, 'IDUSUARIO');
	}

	public function comentariosentrenadors()
	{
		return $this->hasMany(Comentariosentrenador::class, 'IDUSUARIO');
	}

	public function contratacions()
	{
		return $this->hasMany(Contratacion::class, 'IDUSUARIO');
	}

	public function likeobjetivomusculares()
	{
		return $this->hasMany(Likeobjetivomusculare::class, 'IDUSUARIO');
	}

	public function likeobjetivopersonals()
	{
		return $this->hasMany(Likeobjetivopersonal::class, 'IDUSUARIO');
	}

	public function liketejercicios()
	{
		return $this->hasMany(Liketejercicio::class, 'IDUSUARIO');
	}

	public function log_usuario_updates_w_hs()
	{
		return $this->hasMany(LogUsuarioUpdatesWH::class, 'IDUSUARIO');
	}

	public function objetivospersonales()
	{
		return $this->belongsToMany(Objetivospersonale::class, 'objetivospersonalesusuario', 'IDUSUARIO', 'IDOBJETIVOSPERSONALES')
					->withPivot('IDOBJETIVOSPERSONALESUSUARIO');
	}

	public function progresos()
	{
		return $this->hasMany(Progreso::class, 'IDUSUARIO');
	}

	public function progresousuarios()
	{
		return $this->hasMany(Progresousuario::class, 'IDUSUARIO');
	}
}
