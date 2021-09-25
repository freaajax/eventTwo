<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\User;

class ConnController extends Controller
{
  public function ConnEvents($id) {
    $model = User::where('id', '=', $id)->first();

    dd($model->name);
    // INSERT INTO users_events (user_id, event_id) VALUES (3,1)
  }
  public function Resul(){
    return view('admin', ['event' => Event::all() , 'user' => User::all()]);
  }
  public function Choose(Request $request){
    $userId = $request->get('user_admin');
    $eventId = $request->get('event_admin');
    $iNdata = DB::insert('insert into users_events (user_id, event_id) values (?, ?)', [$userId, $eventId]);
    dd($iNdata);
  }
  public function AddEvent(Request $request){
    $title = $request->input('title');
    $content = $request->input('content');
    $date = $request->input('date');
    $tags = $request->input('tags');
    $image = $request->file('image')->store('images/events', 'public');
    $do = DB::insert('insert into events (image,article,content,date,tags) values (?, ?,?,?,?)', [$image, $title, $content, $date, $tags]);
    dd($do);
  }
}
