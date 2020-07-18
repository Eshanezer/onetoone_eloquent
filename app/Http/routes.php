<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Address;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

/* Eloquent One to one Relationship CRUD*/

Route::get('/insert', function () {
    $user =User::findOrFail(1);

    $address = new Address(['name'=>'1234 Station Road - Delkanda']);
    $user->address()->save($address);
});


Route::get('/update', function () {
   $address = Address::whereUserId(1)->first();

   $address->name="12/32 new Station Road";

   $address->save();
});

Route::get('/read', function () {
    $user =User::findOrFail(1);
    echo $user->address->name;
});

Route::get('/delete', function () {
    $user =User::findOrFail(1);
    echo $user->address()->delete();
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
