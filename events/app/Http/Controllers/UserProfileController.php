<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\ProfileEditRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function ShowUserProfile(){
      return view('userProfile');
    }
    public function ViewEditProfile(){
      return view('editProfile');
    }
    public function UpdateProfile($id, ProfileEditRequest $req) {
           $model = User::where('id', '=', $id)->first();
           $model->name = $req->input('profile-name');
           $model->email = $req->input('profile-email');
           $model->phone = $req->input('profile-phone');
           $model->save();
           return redirect()->route('app');

    }
    public function UpdatePasswordProfile($id, UserRequest $req) {
          $model = User::where('id', '=', $id)->first();
          $old_password = $model->password;
          $old_input = $req->input('old-password');
          $check = Hash::check($old_input, $old_password);
          if($check === true){
          $model->password = Hash::make($req->input('new-password'));
          $model->save();
          return redirect()->route('profile', ['id' => $id])->with('success','Your password has been successfully updated');
          }
          else {
          return redirect()->route('profile', ['id' => $id])->with('epass','Something went wrong');
          }
    }
}
