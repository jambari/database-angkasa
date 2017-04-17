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
    protected $fillable = ['tanggal','waktu','lintang','bujur','magnitudo', 'kedalaman', 'lokasi','terasa','dirasakan', 'tsunami', 'sumber'];
    // protected $hidden = [];
    // protected $dates = [];
    //protected $dateFormat = 'd-m-Y';
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

	//Asesor tsunami
	public function getTsunamiAttribute($value)
	{
		if ($value==0) {
			$value = 'Tidak';
			return $value;
		} else {
			$value = 'Berpotensi';
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
	public function getTanggalAttribute($value)
	{
		return date("d-m-Y", strtotime($value));
	}

}
