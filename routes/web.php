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

Route::get('/clase', function () {
    return view('mi-clase');
});

// Path de la ruta, 'NombreDelController@FunciónDentroDelController'
Route::get('/prueba-controller', 'PruebaController@index');

Route::resource('coins', 'CoinsController')->middleware('not_guest');

Route::get('register', 'AuthController@register')
    ->middleware(['validate_hour'])
    ->name('auth.register');
Route::post('register', 'AuthController@doRegister')
    ->middleware(['validate_hour'])
    ->name('auth.do-register');

Route::get('login', 'AuthController@login')
    ->middleware(['validate_hour'])
    ->name('auth.login');
Route::post('login', 'AuthController@doLogin')
    ->middleware(['validate_hour'])
    ->name('auth.do-login');

Route::any('logout', 'AuthController@logout')->name('auth.logout');

Route::get('users', 'AuthController@showUsers')->name('users.index')->middleware(['not_user', 'not_guest']);
Route::delete('users.destroy/{user}',  'AuthController@deleteUser')->name('users.destroy')->middleware(['not_admin', 'not_user', 'not_guest']);

Route::get('dashboard', function() {
    return view('extra.dashboard');
})->middleware(['not_guest']);
