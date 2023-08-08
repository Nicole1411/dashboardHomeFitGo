<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Multimedia
 * 
 * @property int $IDMULTIMEDIA
 * @property string $TITULOMULTIMEDIA
 * @property string $DESCRIPCIONMULTIMEDIA
 * @property string $ALMACENAMIENTOMULTIMEDIA
 * @property int $STATUSMULTIMEDIA
 * @property Carbon|null $TIEMPOMULTIMEDIA
 * @property string|null $OBSERVACIONMULTIMEDIA
 * @property int|null $IDENTRENADORMULTIMEDIA
 * 
 * @property Persona|null $persona
 * @property Collection|Ejercicio[] $ejercicios
 *
 * @package App\Models
 */
class Multimedia extends Model
{
	protected $table = 'multimedia';
	protected $primaryKey = 'IDMULTIMEDIA';
	public $timestamps = false;

	protected $casts = [
		'STATUSMULTIMEDIA' => 'int',
		'TIEMPOMULTIMEDIA' => 'datetime',
		'IDENTRENADORMULTIMEDIA' => 'int'
	];

	protected $fillable = [
		'TITULOMULTIMEDIA',
		'DESCRIPCIONMULTIMEDIA',
		'ALMACENAMIENTOMULTIMEDIA',
		'STATUSMULTIMEDIA',
		'TIEMPOMULTIMEDIA',
		'OBSERVACIONMULTIMEDIA',
		'IDENTRENADORMULTIMEDIA'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'IDENTRENADORMULTIMEDIA');
	}

	public function ejercicios()
	{
		return $this->hasMany(Ejercicio::class, 'IDMULTIMEDIA');
	}
}
