<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\EstudianteController;
use GuzzleHttp\Middleware;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('users',[App\Http\Controllers\UserController::class, 'store']);

Route::group(['middleware' => ['auth:sanctum']], function(){

   Route::get('users',[UserController::class, 'users']); 
   
});
Route::post('login',[UserController::class, 'login']); 
//carreras get,post,update,put
Route::resource('/carreras', CarreraController::class);
//modalidades get,post,update,put
Route::resource('/modalidades', ModalidadController::class); 
//estudiantes
Route::resource('/estudiantes', EstudianteController::class);
Route::get('/getEstudianteSolicitud/{id}',[EstudianteController::class, 'getEstudianteSolicitud'])->name('solicitud-estudiante');