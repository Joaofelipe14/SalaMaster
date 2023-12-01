<?php

use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\SalaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/logar', [LoginController::class, 'showLoginForm']);
Route::post('/logar', [LoginController::class, 'login']);


// Rotas do Adminstrador 
Route::group(['middleware' => ['check.jwt.token', 'checkAdminstrador']], function () {

    Route::resource('professores', ProfessorController::class);
    Route::resource('periodos', PeriodoController::class);
    Route::resource('disciplinas', DisciplinaController::class);
    Route::resource('salas', SalaController::class);
});

// Rotas do Professor 
Route::group(['middleware' => ['check.jwt.token', 'checkAdminstrador']], function () {
});



require __DIR__ . '/auth.php';
