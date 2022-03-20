<?php

use Illuminate\Support\Facades\Route;
use App\Container;
use App\Organization;

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

//Auth::routes();

// TODO: Apagar depois, está sendo utilizado somente para testes
Route::get('/containers', function(Request $request) {
    $organizations = collect(Organization::all());
    $containers = collect(Container::all());
    $merged = $containers->concat($organizations);
    $result = $merged->all();    
    return($result);    
})->name('containers');

// Rotas de autenticação
Route::get('login', 'AuthController@index')->name('login');
Route::post('login', 'AuthController@authenticate')->name('login'); 
Route::post('logout', 'AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth','prefix' => '/'], function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('organizations', 'OrganizationController');
}); 
