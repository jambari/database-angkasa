<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Calendar;
class CalendarController extends Controller
{
    public function index()
    {	
 
    	$events = Event::all(); //EventModel implements MaddHatter\LaravelFullcalendar\Event
    	$calendar = \Calendar::addEvents($events)->setOptions([]); 
    	return view('kalender.kalender', compact('calendar'));
    }
}
