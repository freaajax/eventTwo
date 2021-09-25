<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ConnController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('app');
})->name('app');

Route::get('/', 'App\Http\Controllers\EventController@DataEvent')->name('app');
Route::get('/users', [UsersController::class, 'UsersViews'])->name('users');


Route::get('/admin');
Route::get('/admin', [ConnController::class, 'Resul'])->name('admin');
Route::get('/admin/ch', [ConnController::class, 'Choose'])->name('choose');
Route::post('/admin/add', [ConnController::class, 'AddEvent'])->name('add');

//Route::get('/users', function () {
//    return view('users');
//})->name('users');

Route::group(['middleware' => 'auth', 'namespace' => 'App\Http\Controller'], function(){
  Route::post('/{id}', [ConnController::class, 'ConnEvents'])->name('subscribe');
  Route::get('/profile/{id}', [UserProfileController::class, 'ShowUserProfile'])->name('profile');
  Route::get('/profile/{id}/edit', [UserProfileController::class, 'ViewEditProfile'])->name('edit-profile');
  Route::post('/profile/{id}/edit', [UserProfileController::class, 'UpdateProfile'])->name('edit-form');
  Route::post('/profile/{id}/pass', [UserProfileController::class, 'UpdatePasswordProfile'])->name('password');
});


Auth::routes();



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
