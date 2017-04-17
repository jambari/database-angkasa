<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\Gempabumi;
use App\Models\Komponend;
use App\Models\Hujan;
use App\Models\Summary;
use Calendar;

class DashboardController extends Controller
{
    public function index()
    {
    	$events = Event::all(); //EventModel implements MaddHatter\LaravelFullcalendar\Event
    	$calendar = \Calendar::addEvents($events)->setOptions([]); 
    	$gempa = DB::table('gempabumis')->orderBy('created_at', 'desc')->first();
    	$komponend = Komponend::all()->last();
        $deklinasi = ($komponend['jam00']+$komponend['jam01']+$komponend['jam02']+$komponend['jam03']+$komponend['jam04']+$komponend['jam05']+$komponend['jam06']+$komponend['jam07']+$komponend['jam08']+$komponend['jam09']+$komponend['jam10']+$komponend['jam11']+$komponend['jam12']
            +$komponend['jam13']+$komponend['jam14']+$komponend['jam15']+$komponend['jam16']+$komponend['jam17']+$komponend['jam18']+$komponend['jam19']+$komponend['jam20']+$komponend['jam21']+$komponend['21']+$komponend['jam22']+$komponend['jam23'])/24;
    	$hujan = Hujan::all()->last();
    	$summary = Summary::all()->last();
    	return view('vendor.backpack.base.dashboard')->with(compact('calendar', 'gempa', 'komponend', 'hujan', 'summary', 'deklinasi'));
    }
}
