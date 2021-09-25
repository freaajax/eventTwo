<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function DataEvent() {
      return view('app', ['data' => Event::all()]);
    }
}
