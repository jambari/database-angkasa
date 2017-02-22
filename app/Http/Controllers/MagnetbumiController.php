<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absolut;
use App\Models\Kindex;
use App\Models\Komponend;
use App\Models\Komponenf;
use App\Models\Komponenh;
use App\Models\Komponeni;
use App\Models\Komponenz;
use App\Models\Prekursor;
use Validator;
use Excel;
use Alert;
use Carbon\Carbon;
class MagnetbumiController extends Controller 
{
    public  function importExcel(Request $request)
    {
    	$rules = array(
    		'table' => 'required',
    		'excel' => 'required|mimes:xls,xlsx,csv'
    	);
	    $table = $request->input('table');
	    $validator = Validator::make($request->all(), $rules);
	    // process the form
	    if ($validator->fails()) 
	    {
	        return back()->withErrors($validator);
	    }
	    else 
	    {
	        $path = $request->file('excel')->getRealPath();
        	$data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){
                foreach ($data->toArray() as $key => $rows) {
                    if(!empty($rows)){
                        foreach ($rows as $row) {  
                        	switch ($table) {
					       	case 'Absolut':
					       		 $insert =[
					       		 	'tanggal' => $row['tanggal'],
					       		 	'komponen_h' => $row['komponen_h'],
					       		 	'komponen_d' => $row['komponen_d'],
					       		 	'komponen_i' => $row['komponen_i'],
					       		 	'komponen_z' => $row['komponen_z'],
					       		 	'komponen_f' => $row['komponen_f'],
					       		 	'pengamat' => $row['pengamat']
					       		];
					       		break;
					       	case 'Kindex':
					       		$insert = [
					       			'tanggal' => $row['tanggal'],
					       		 	'k1' => $row['k1'],
					       		 	'k2' => $row['k2'],
					       		 	'k3' => $row['k3'],
					       		 	'k4' => $row['k4'],
					       		 	'k5' => $row['k5'],
					       		 	'k6' => $row['k6'],
					       		 	'k7' => $row['k7'],
					       		 	'k8' => $row['k8'],
					       		 	'aindex' => $row['aindex']
					       		];
					       		break;
					       	case 'Komponend':
					       		$insert = [
					       			'tanggal' => $row['tanggal'],
					       			'jam00' => $row['jam00'],
					       			'jam01' => $row['jam01'],
					       			'jam02' => $row['jam02'],
					       			'jam03' => $row['jam03'],
					       			'jam04' => $row['jam04'],
					       			'jam05' => $row['jam05'],
					       			'jam06' => $row['jam06'],
					       			'jam07' => $row['jam07'],
					       			'jam08' => $row['jam08'],
					       			'jam09' => $row['jam09'],
					       			'jam10' => $row['jam10'],
					       			'jam11' => $row['jam11'],
					       			'jam12' => $row['jam12'],
					       			'jam13' => $row['jam13'],
					       			'jam14' => $row['jam014'],
					       			'jam15' => $row['jam15'],
					       			'jam16' => $row['jam16'],
					       			'jam17' => $row['jam017'],
					       			'jam18' => $row['jam18'],
					       			'jam19' => $row['jam19'],
					       			'jam20' => $row['jam20'],
					       			'jam21' => $row['jam21'],
					       			'jam22' => $row['jam22'],
					       			'jam23' => $row['jam23'],
					       		];
					       		break;
					       	case 'Komponenf':
					       		$insert = [
					       			'tanggal' => $row['tanggal'],
					       			'jam00' => $row['jam00'],
					       			'jam01' => $row['jam01'],
					       			'jam02' => $row['jam02'],
					       			'jam03' => $row['jam03'],
					       			'jam04' => $row['jam04'],
					       			'jam05' => $row['jam05'],
					       			'jam06' => $row['jam06'],
					       			'jam07' => $row['jam07'],
					       			'jam08' => $row['jam08'],
					       			'jam09' => $row['jam09'],
					       			'jam10' => $row['jam10'],
					       			'jam11' => $row['jam11'],
					       			'jam12' => $row['jam12'],
					       			'jam13' => $row['jam13'],
					       			'jam14' => $row['jam014'],
					       			'jam15' => $row['jam15'],
					       			'jam16' => $row['jam16'],
					       			'jam17' => $row['jam017'],
					       			'jam18' => $row['jam18'],
					       			'jam19' => $row['jam19'],
					       			'jam20' => $row['jam20'],
					       			'jam21' => $row['jam21'],
					       			'jam22' => $row['jam22'],
					       			'jam23' => $row['jam23'],
					       		];
					       		break;
					       	case 'Komponenh':
					       		$nsert = [
					       			'tanggal' => $row['tanggal'],
					       			'jam00' => $row['jam00'],
					       			'jam01' => $row['jam01'],
					       			'jam02' => $row['jam02'],
					       			'jam03' => $row['jam03'],
					       			'jam04' => $row['jam04'],
					       			'jam05' => $row['jam05'],
					       			'jam06' => $row['jam06'],
					       			'jam07' => $row['jam07'],
					       			'jam08' => $row['jam08'],
					       			'jam09' => $row['jam09'],
					       			'jam10' => $row['jam10'],
					       			'jam11' => $row['jam11'],
					       			'jam12' => $row['jam12'],
					       			'jam13' => $row['jam13'],
					       			'jam14' => $row['jam014'],
					       			'jam15' => $row['jam15'],
					       			'jam16' => $row['jam16'],
					       			'jam17' => $row['jam017'],
					       			'jam18' => $row['jam18'],
					       			'jam19' => $row['jam19'],
					       			'jam20' => $row['jam20'],
					       			'jam21' => $row['jam21'],
					       			'jam22' => $row['jam22'],
					       			'jam23' => $row['jam23'],
					       		];
					       		break;
					       	case 'Komponeni' :
					       		$insert = [
					       		'tanggal' => $row['tanggal'],
					       			'jam00' => $row['jam00'],
					       			'jam01' => $row['jam01'],
					       			'jam02' => $row['jam02'],
					       			'jam03' => $row['jam03'],
					       			'jam04' => $row['jam04'],
					       			'jam05' => $row['jam05'],
					       			'jam06' => $row['jam06'],
					       			'jam07' => $row['jam07'],
					       			'jam08' => $row['jam08'],
					       			'jam09' => $row['jam09'],
					       			'jam10' => $row['jam10'],
					       			'jam11' => $row['jam11'],
					       			'jam12' => $row['jam12'],
					       			'jam13' => $row['jam13'],
					       			'jam14' => $row['jam014'],
					       			'jam15' => $row['jam15'],
					       			'jam16' => $row['jam16'],
					       			'jam17' => $row['jam017'],
					       			'jam18' => $row['jam18'],
					       			'jam19' => $row['jam19'],
					       			'jam20' => $row['jam20'],
					       			'jam21' => $row['jam21'],
					       			'jam22' => $row['jam22'],
					       			'jam23' => $row['jam23']
					       		];
					       		break;
					       	case 'Komponenz' :
					       		$insert = [
					       			'tanggal' => $row['tanggal'],
					       			'jam00' => $row['jam00'],
					       			'jam01' => $row['jam01'],
					       			'jam02' => $row['jam02'],
					       			'jam03' => $row['jam03'],
					       			'jam04' => $row['jam04'],
					       			'jam05' => $row['jam05'],
					       			'jam06' => $row['jam06'],
					       			'jam07' => $row['jam07'],
					       			'jam08' => $row['jam08'],
					       			'jam09' => $row['jam09'],
					       			'jam10' => $row['jam10'],
					       			'jam11' => $row['jam11'],
					       			'jam12' => $row['jam12'],
					       			'jam13' => $row['jam13'],
					       			'jam14' => $row['jam014'],
					       			'jam15' => $row['jam15'],
					       			'jam16' => $row['jam16'],
					       			'jam17' => $row['jam017'],
					       			'jam18' => $row['jam18'],
					       			'jam19' => $row['jam19'],
					       			'jam20' => $row['jam20'],
					       			'jam21' => $row['jam21'],
					       			'jam22' => $row['jam22'],
					       			'jam23' => $row['jam23']
					       		];
					       		break;
					       	case 'Prekursor' :
					       		$insert = [
					       			'tanggal' => $row['tanggal'],
					       			'polarisasi' => $row['polarisasi'],
					       			'stdplus' => $row['stdplus'],
					       			'stdminus' => $row['stdminus'],
					       			'dstindex' => $row['dstindex']
					       		];
					       	default:
					       		return back()->with('error', 'Silahkan pilih jenis komponen');
					       		break;
					       }      
                        }
                    }
                }
                if(!empty($insert)){
                        $table::insert($insert);
                        \Alert::success('Data berhasil ditambahkan')->flash();
                    return redirect('admin/pengamatan/'.strtolower($table));
                }
            }
        }
        //\Alert::error('Ada yang salah dengan data anda, tolong perbaiki')->flash();
        return back()->with('error', 'Ada yang salah, silahkan cek data anda');
    }
}
