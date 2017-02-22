<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Http\Request;

class Gempabumi extends Model
{
    use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

    //protected $table = 'gempabumis';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['tanggal','waktu','lintang','bujur','magnitudo', 'kedalaman', 'lokasi','terasa','dirasakan','pga_z', 'pga_ns', 'pga_ew', 'sumber'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/
	public function getTerasaAttribute($value)
	{
		if ($value==0) {
			$value = 'tidak';
			return $value;
		} else {
			$value = 'dirasakan';
			return $value;
		}
	}
    /*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
	public function importgempa()
	{
		return view('Gempabumi.importgempa');
	}

	public function setIdGempabumiAttribute($value)
	{
		$tanggal = $this->attributes['tanggal'];
		$waktu = $this->attributes['waktu'];
		$this->attributes['id_gempabumi'] = strtolower($value).$tanggal.'-'.$waktu;
		//
	}

}
