<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
  public function UsersViews() {
    return view('users', ['views_user' => User::all()]);
  }
}
