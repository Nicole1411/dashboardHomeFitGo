<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Idiomaspersona
 * 
 * @property int $IDIDIOMAPERSONA
 * @property int $IDPERSONA
 * @property int $IDIDIOMA
 * 
 * @property Idioma $idioma
 * @property Persona $persona
 *
 * @package App\Models
 */
class Idiomaspersona extends Model
{
	protected $table = 'idiomaspersona';
	protected $primaryKey = 'IDIDIOMAPERSONA';
	public $timestamps = false;

	protected $casts = [
		'IDPERSONA' => 'int',
		'IDIDIOMA' => 'int'
	];

	protected $fillable = [
		'IDPERSONA',
		'IDIDIOMA'
	];

	public function idioma()
	{
		return $this->belongsTo(Idioma::class, 'IDIDIOMA');
	}

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'IDPERSONA');
	}
}
