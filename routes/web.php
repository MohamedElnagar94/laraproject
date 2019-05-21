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
// Router::pattern('id', '[0-9]+');
$router->pattern('id', '[0-9]+');
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/register', function () {
//     return view('auth.register');
// });
// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::get('username/{username?}', function ($username=null) {
    return 'your name is '. $username;
});

// Route::get('test', function () {
//     return '
//     <form action="" method="POST">
//         <input type="hidden" name="_token" value="'.csrf_token().'" id="">
//         <input type="text" name="username" id="">
//         <input type="submit" name="submit" id="">
//     </form>
//     ';
// });
// Route::post('test', function () {
//     return 'you are in test post '. request('username');
// });

Route::post('test/1', function (Illuminate\Http\Request $request) {
        return $request->all();
    });


route::get('profile','test@index');
route::get('profile','test@store');

// Route::get('students', function () {
//     return view('layouts.students');
// });
route::post('students/insert','StudentController@addstudent');
route::post('students/delete/{id?}','StudentController@delete');
// route::post('students/delete/all/{id?}','StudentController@deleteall');
Route::post('students/delete/all/{id?}', 'StudentController@deleteall');
Route::post('students/recycle/{id?}', 'StudentController@recycle');
// Route::put('students/delete/all/{id}', 'StudentController@deleteall');

// Route::post('students/delete/all', ['as' => 'login', 'uses' => 'LoginController@getLogin']);

Route::group(['middleware' => 'students'], function () {
route::get('students','StudentController@store');
});
route::post('students/upload/singlefile','StudentController@uploadsingle');
route::post('students/upload/multiplefile','StudentController@uploadmultiple');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::post('students/delete/all', 'StudentController@destroy')->name('id[]');
    
Route::group(['middleware' => 'guest'], function () {
    Route::get('students/login','LoginController@index');
    Route::post('students/login','LoginController@show');
    
});