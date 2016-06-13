<?php

use Illuminate\Database\Schema\Blueprint;
use App\User;

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

// Route::get('/', function () {
//     return view('welcome');
// });

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
    Route::get('/', 'InitRoutesController@index');

    Route::get('auth/register', function() {
      $users = User::all()->toArray();
      if (empty($users)) {
        return view('auth.register');
      } else {
        return redirect('items');
      }
    });
    Route::get('auth/login', function() {
      $users = User::all()->toArray();
      if (empty($users)) {
        return redirect('auth/register');
      } elseif (Auth::guest()) {
        return view('auth/login');
      } else {
        return redirect('items');
      }
    });
    Route::controller('auth', 'Auth\AuthController');
    Route::controller('items', 'ItemsController');
    Route::controller('posts', 'PostsController');
});
