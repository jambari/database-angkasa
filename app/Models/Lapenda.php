<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Http\Request;

class Lapenda extends Model
{
    use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

    protected $table = 'gempabumis';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    //protected $fillable = ['tanggal','waktu','lintang','bujur','magnitudo', 'kedalaman', 'lokasi','terasa','dirasakan', 'sumber'];
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
	*/
    /*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/

	//ASESSOR TANGGAL GEMPA 
	public function getTanggalAttribute($value)
	{	
		$waktu = date_parse($this->waktu);
		$jam = $waktu['hour'];
		//klo hasilnya mines, hari + 1
		$diff = $jam - 9;
		$diff_split= str_split($diff);
		$pertama = $diff_split[0];
		if ($pertama === '-') {
			$hariini = $value;
			$besok = str_replace('-', '/', $hariini);
			$value = date('Y-m-d', strtotime($besok . "+1 days"));
					$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
					
		$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
		$split 	  = explode('-', $value);
		$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
			
		$num = date('N', strtotime($value));
		$value = $hari[$num] . ', ' . $tgl_indo;
		return $value;
		} else {
			$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
					
		$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
		$split 	  = explode('-', $value);
		$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
			
		$num = date('N', strtotime($value));
		$value = $hari[$num] . ', ' . $tgl_indo;
		return $value;
		}

	}

	//ASESSOR TANGGAL DIBUAT
	public function getCreatedAtAttribute($value)
	{
		$tanggal = date('Y-m-d', strtotime($value));
		$bulan = array (1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$split = explode('-', $tanggal);
		$value = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		return $value;
	}
	//ASSESOR WAKTU
	public function getWaktuAttribute($value)
	{
		$time = $value;
		$parsed = date_parse($time);
		$seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
		$wit_dif = 60 * 60 * 9 ;
		$wit = $seconds + $wit_dif;
		$value = gmdate("H:i:s",$wit);
		return $value;
	}
	// ASESSOR LINTANG
	public function getLintangAttribute($value)
	{
		$pecah  = str_split($value);
		if ($pecah[0] ==='-' ){
			$value = $pecah[1].$pecah[2].$pecah[3].' '.'LS';
			return $value;
		}
		//$value = $pecah[1].$pecah[2].$pecah[3];
		return $value.' '.'LU';
	}
	// ASSESOR BUJUR
	public function getBujurAttribute($value)
	{
		$value = $value.' '.'BT';
		return $value;
	}
		public function getTsunamiAttribute($value)
	{
		if ($value==0) {
			$value = 'Tidak berpotensi tsunami';
			return $value;
		} else {
			$value = 'Berpotensi tsunami';
			return $value;
		}
	}
}
