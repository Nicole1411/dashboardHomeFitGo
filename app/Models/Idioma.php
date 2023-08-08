<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Idioma
 * 
 * @property int $IDIDIOMA
 * @property string|null $DESCRIPCIONIDIOMA
 * 
 * @property Collection|Persona[] $personas
 *
 * @package App\Models
 */
class Idioma extends Model
{
	protected $table = 'idiomas';
	protected $primaryKey = 'IDIDIOMA';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDIDIOMA' => 'int'
	];

	protected $fillable = [
		'DESCRIPCIONIDIOMA'
	];

	public function personas()
	{
		return $this->belongsToMany(Persona::class, 'idiomaspersona', 'IDIDIOMA', 'IDPERSONA')
					->withPivot('IDIDIOMAPERSONA');
	}
}
