<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Programarsesion
 * 
 * @property int $IDSESION
 * @property int|null $IDENTRENADOR
 * @property int|null $IDFRECUENCIASESION
 * @property int|null $IDPROFESIONSESION
 * @property int|null $IDOBJETIVOSPERSONALESSESION
 * @property string $NOMBRESESION
 * @property string|null $IMAGESESION
 * @property string $OBJETIVOSESION
 * @property int|null $USUARIOCREACIONSESION
 * @property int|null $USUARIOMODIFICACIONSESION
 * @property Carbon|null $FECHACREACIONSESION
 * @property Carbon|null $FECHAMODIFICACIONSESION
 * @property int|null $STATUSSESION
 * @property string|null $OBSERVACIONSESION
 * 
 * @property Persona|null $persona
 * @property Frecuenciaejercicio|null $frecuenciaejercicio
 * @property Objetivospersonale|null $objetivospersonale
 * @property Profesion|null $profesion
 * @property Collection|Bookmarksesione[] $bookmarksesiones
 * @property Collection|Rutina[] $rutinas
 * @property Collection|Progresousuario[] $progresousuarios
 *
 * @package App\Models
 */
class Programarsesion extends Model
{
	protected $table = 'programarsesion';
	protected $primaryKey = 'IDSESION';
	public $timestamps = false;

	protected $casts = [
		'IDENTRENADOR' => 'int',
		'IDFRECUENCIASESION' => 'int',
		'IDPROFESIONSESION' => 'int',
		'IDOBJETIVOSPERSONALESSESION' => 'int',
		'USUARIOCREACIONSESION' => 'int',
		'USUARIOMODIFICACIONSESION' => 'int',
		'FECHACREACIONSESION' => 'datetime',
		'FECHAMODIFICACIONSESION' => 'datetime',
		'STATUSSESION' => 'int'
	];

	protected $fillable = [
		'IDENTRENADOR',
		'IDFRECUENCIASESION',
		'IDPROFESIONSESION',
		'IDOBJETIVOSPERSONALESSESION',
		'NOMBRESESION',
		'IMAGESESION',
		'OBJETIVOSESION',
		'USUARIOCREACIONSESION',
		'USUARIOMODIFICACIONSESION',
		'FECHACREACIONSESION',
		'FECHAMODIFICACIONSESION',
		'STATUSSESION',
		'OBSERVACIONSESION'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'USUARIOMODIFICACIONSESION');
	}

	public function frecuenciaejercicio()
	{
		return $this->belongsTo(Frecuenciaejercicio::class, 'IDFRECUENCIASESION');
	}

	public function objetivospersonale()
	{
		return $this->belongsTo(Objetivospersonale::class, 'IDOBJETIVOSPERSONALESSESION');
	}

	public function profesion()
	{
		return $this->belongsTo(Profesion::class, 'IDPROFESIONSESION');
	}

	public function bookmarksesiones()
	{
		return $this->hasMany(Bookmarksesione::class, 'IDSESION');
	}

	public function rutinas()
	{
		return $this->belongsToMany(Rutina::class, 'programarsesionrutinas', 'IDSESION', 'IDRUTINA')
					->withPivot('IDPROGRAMARSESIONRUTINAS');
	}

	public function progresousuarios()
	{
		return $this->hasMany(Progresousuario::class, 'IDSESION');
	}
}
