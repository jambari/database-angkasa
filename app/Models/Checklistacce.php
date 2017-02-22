<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Checklistacce extends Model
{
    use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

    //protected $table = 'checklistacces';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['tanggal', 'Z', 'NS', 'EW', 'modem', 'power', 'tegangan_ups', 'temperatur', 'petugas' ];
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
	public function getZAttribute($value)
	{
		if ($value==0) {
			$value = 'tidak';
			return $value;
		} else {
			$value = 'terekam';
			return $value;
		}
	}
	public function getNSAttribute($value)
	{
		if ($value==0) {
			$value = 'tidak';
			return $value;
		} else {
			$value = 'terekam';
			return $value;
		}
	}

	public function getEWAttribute($value)
	{
		if ($value==0) {
			$value = 'tidak';
			return $value;
		} else {
			$value = 'terekam';
			return $value;
		}
	}

	public function getModemAttribute($value)
	{
		if ($value==0) {
			$value = 'off';
			return $value;
		} else {
			$value = 'on';
			return $value;
		}
	}
	public function getPowerAttribute($value)
	{
		if ($value==0) {
			$value = 'off';
			return $value;
		} else {
			$value = 'on';
			return $value;
		}
	}
    /*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
}
