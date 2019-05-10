<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('username/{username?}', function ($username=null) {
    return 'your name is '. $username;
});

Route::get('test', function () {
    return '
    <form action="" method="POST">
        <input type="hidden" name="_token" value="'.csrf_token().'" id="">
        <input type="text" name="username" id="">
        <input type="submit" name="submit" id="">
    </form>
    ';
});
Route::post('test', function () {
    return 'you are in test post '. request('username');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
