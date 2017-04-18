<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Http\Request;

class Checklistseiscomp extends Model
{
    use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

    //protected $table = 'checklistseiscomps';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['tanggal', 'jam01', 'jam02', 'jam03', 'jam04', 'jam05', 'jam06', 'jam07',
    	'jam08', 'jam09', 'jam10', 'jam11', 'jam12', 'jam13', 'jam14', 'jam15', 'jam16', 'jam17',
    	'jam18', 'jam19', 'jam20', 'jam21', 'jam22', 'jam23','jam24', 'on', 'off', 'persentase', 'keterangan', 'petugas'
    ];
    // protected $hidden = [];
    // protected $dates = [];

    public function getOnAttribute ($value) 
    {
    	$jam01 = $this->attributes['jam01'];
    	$jam02 = $this->attributes['jam02'];
    	$jam03 = $this->attributes['jam03'];
    	$jam04 = $this->attributes['jam04'];
    	$jam05 = $this->attributes['jam05'];
    	$jam06 = $this->attributes['jam06'];
    	$jam07 = $this->attributes['jam07'];
    	$jam08 = $this->attributes['jam08'];
    	$jam09 = $this->attributes['jam09'];
    	$jam10 = $this->attributes['jam10'];
    	$jam11 = $this->attributes['jam11'];
    	$jam12 = $this->attributes['jam12'];
    	$jam13 = $this->attributes['jam13'];
    	$jam14 = $this->attributes['jam14'];
    	$jam15 = $this->attributes['jam15'];
    	$jam16 = $this->attributes['jam16'];
    	$jam17 = $this->attributes['jam17'];
    	$jam18 = $this->attributes['jam18'];
    	$jam19 = $this->attributes['jam19'];
    	$jam20 = $this->attributes['jam20'];
    	$jam21 = $this->attributes['jam21'];
    	$jam22 = $this->attributes['jam22'];
    	$jam23 = $this->attributes['jam23'];
    	$jam24 = $this->attributes['jam24'];
    	$value = $jam01 + $jam02 + $jam03 + $jam04 + $jam05 + $jam06 + $jam07 + $jam08 + $jam09 +$jam10
    	+ $jam11 + $jam12 + $jam13 + $jam14 + $jam15 + $jam16 + $jam17 + $jam18 + $jam19 + $jam20 + $jam21 + $jam22 + $jam23 + $jam24 ;
    	return $value;
    }

    public function getOffAttribute ($value) 
    {
    	$jam01 = $this->attributes['jam01'];
    	$jam02 = $this->attributes['jam02'];
    	$jam03 = $this->attributes['jam03'];
    	$jam04 = $this->attributes['jam04'];
    	$jam05 = $this->attributes['jam05'];
    	$jam06 = $this->attributes['jam06'];
    	$jam07 = $this->attributes['jam07'];
    	$jam08 = $this->attributes['jam08'];
    	$jam09 = $this->attributes['jam09'];
    	$jam10 = $this->attributes['jam10'];
    	$jam11 = $this->attributes['jam11'];
    	$jam12 = $this->attributes['jam12'];
    	$jam13 = $this->attributes['jam13'];
    	$jam14 = $this->attributes['jam14'];
    	$jam15 = $this->attributes['jam15'];
    	$jam16 = $this->attributes['jam16'];
    	$jam17 = $this->attributes['jam17'];
    	$jam18 = $this->attributes['jam18'];
    	$jam19 = $this->attributes['jam19'];
    	$jam20 = $this->attributes['jam20'];
    	$jam21 = $this->attributes['jam21'];
    	$jam22 = $this->attributes['jam22'];
    	$jam23 = $this->attributes['jam23'];
    	$jam24 = $this->attributes['jam24'];
    	$total = $jam01 + $jam02 + $jam03 + $jam04 + $jam05 + $jam06 + $jam07 + $jam08 + $jam09 +$jam10
    	+ $jam11 + $jam12 + $jam13 + $jam14 + $jam15 + $jam16 + $jam17 + $jam18 + $jam19 + $jam20 + $jam21 + $jam22 + $jam23 + $jam24 ;
    	$value = 24 - $total;
    	return $value;
    }
    public function getPersentaseAttribute ($value) 
    {
    	$jam01 = $this->attributes['jam01'];
    	$jam02 = $this->attributes['jam02'];
    	$jam03 = $this->attributes['jam03'];
    	$jam04 = $this->attributes['jam04'];
    	$jam05 = $this->attributes['jam05'];
    	$jam06 = $this->attributes['jam06'];
    	$jam07 = $this->attributes['jam07'];
    	$jam08 = $this->attributes['jam08'];
    	$jam09 = $this->attributes['jam09'];
    	$jam10 = $this->attributes['jam10'];
    	$jam11 = $this->attributes['jam11'];
    	$jam12 = $this->attributes['jam12'];
    	$jam13 = $this->attributes['jam13'];
    	$jam14 = $this->attributes['jam14'];
    	$jam15 = $this->attributes['jam15'];
    	$jam16 = $this->attributes['jam16'];
    	$jam17 = $this->attributes['jam17'];
    	$jam18 = $this->attributes['jam18'];
    	$jam19 = $this->attributes['jam19'];
    	$jam20 = $this->attributes['jam20'];
    	$jam21 = $this->attributes['jam21'];
    	$jam22 = $this->attributes['jam22'];
    	$jam23 = $this->attributes['jam23'];
    	$jam24 = $this->attributes['jam24'];
    	$total = $jam01 + $jam02 + $jam03 + $jam04 + $jam05 + $jam06 + $jam07 + $jam08 + $jam09 +$jam10
    	+ $jam11 + $jam12 + $jam13 + $jam14 + $jam15 + $jam16 + $jam17 + $jam18 + $jam19 + $jam20 + $jam21 + $jam22 + $jam23 + $jam24 ;
    	$value = ($total/24)*100;
    	$value = round($value).'%';
    	return $value;
    }
    //protected $attributes = array(
    //	'on' => '1',
    //	'off' => '5',
    //	'persentase' => '100%',
    //	'petugas' => 'default'
    //	);
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
	public function getTanggalAttribute($value)
	{
		return date("d-m-Y", strtotime($value));
	}
    /*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
}
