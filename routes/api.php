<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Container;
use App\Organization;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// TODO: Apagar depois, está sendo utilizado somente para testes
Route::get('/containers', function(Request $request) {
    $organizations = collect(Organization::all());
    $containers = collect(Container::all());
    $merged = $containers->concat($organizations);
    $result = $merged->all();    
    return($result);    
})->name('containers');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
