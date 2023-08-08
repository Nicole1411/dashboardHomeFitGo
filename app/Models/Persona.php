<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Persona
 *
 * @property int $IDPERSONA
 * @property int $IDGENERO
 * @property int $IDROLUSUARIO
 * @property string $NOMBREPERSONA
 * @property string $APELLDOPERSONA
 * @property string $CORREOPERSONA
 * @property string $NICKNAMEPERSONA
 * @property Carbon|null $FECHANACIMIENTOPERSONA
 * @property string|null $CONTRASENIAPERSONA
 * @property Carbon|null $FECHACREACIONPERSONA
 * @property Carbon|null $FECHAMODIFICACIONPERSONA
 * @property string|null $USUARIOCREACIONPERSONA
 * @property string|null $USUARIOMODIFICACIONPERSONA
 * @property bool|null $ESTADOPERSONA
 * @property string|null $IMAGEPERSONA
 *
 * @property Genero $genero
 * @property Rolusuario $rolusuario
 * @property Collection|Ejercicio[] $ejercicios
 * @property Collection|Entrenador[] $entrenadors
 * @property Collection|Idioma[] $idiomas
 * @property Collection|LogEjercicio[] $log_ejercicios
 * @property Collection|LogPersona[] $log_personas
 * @property Collection|Multimedia[] $multimedia
 * @property Collection|Programarsesion[] $programarsesions
 * @property Collection|Rutina[] $rutinas
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Persona extends Model implements Authenticatable
{
	protected $table = 'persona';
	protected $primaryKey = 'IDPERSONA';
	public $timestamps = false;

	protected $casts = [
		'IDGENERO' => 'int',
		'IDROLUSUARIO' => 'int',
		'FECHANACIMIENTOPERSONA' => 'datetime',
		'FECHACREACIONPERSONA' => 'datetime',
		'FECHAMODIFICACIONPERSONA' => 'datetime',
		'ESTADOPERSONA' => 'bool'
	];

	protected $fillable = [
		'IDGENERO',
		'IDROLUSUARIO',
		'NOMBREPERSONA',
		'APELLDOPERSONA',
		'CORREOPERSONA',
		'NICKNAMEPERSONA',
		'FECHANACIMIENTOPERSONA',
		'CONTRASENIAPERSONA',
		'FECHACREACIONPERSONA',
		'FECHAMODIFICACIONPERSONA',
		'USUARIOCREACIONPERSONA',
		'USUARIOMODIFICACIONPERSONA',
		'ESTADOPERSONA',
		'IMAGEPERSONA'
	];

	public function genero()
	{
		return $this->belongsTo(Genero::class, 'IDGENERO');
	}

	public function rolusuario()
	{
		return $this->belongsTo(Rolusuario::class, 'IDROLUSUARIO');
	}

	public function ejercicios()
	{
		return $this->hasMany(Ejercicio::class, 'USUARIOMODIFICAICONEJERCICIO');
	}

	public function entrenadors()
	{
		return $this->hasMany(Entrenador::class, 'IDPERSONA');
	}

	public function idiomas()
	{
		return $this->belongsToMany(Idioma::class, 'idiomaspersona', 'IDPERSONA', 'IDIDIOMA')
					->withPivot('IDIDIOMAPERSONA');
	}

	public function log_ejercicios()
	{
		return $this->hasMany(LogEjercicio::class, 'USUARIO_MODIFICACION_EJERCICIO');
	}

	public function log_personas()
	{
		return $this->hasMany(LogPersona::class, 'ID_PERSONA');
	}

	public function multimedia()
	{
		return $this->hasMany(Multimedia::class, 'IDENTRENADORMULTIMEDIA');
	}

	public function programarsesions()
	{
		return $this->hasMany(Programarsesion::class, 'USUARIOMODIFICACIONSESION');
	}

	public function rutinas()
	{
		return $this->hasMany(Rutina::class, 'USUARIOMODIFICAIONRUTINA');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'IDPERSONA');
	}

    public function getAuthIdentifierName()
    {
        return 'IDPERSONA'; // Reemplaza 'IDPERSONA' con el nombre correcto de la columna de identificación
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // Reemplaza por la columna que contiene el identificador único del usuario
    }

    public function getAuthPassword()
    {
        return $this->password; // Reemplaza por la columna que contiene la contraseña encriptada del usuario
    }

    public function getRememberToken()
    {
        return $this->remember_token; // Reemplaza por la columna que contiene el token de "recuérdame"
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value; // Reemplaza por la columna que contiene el token de "recuérdame"
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Reemplaza por el nombre de la columna que almacena el token de "recuérdame"
    }

}
