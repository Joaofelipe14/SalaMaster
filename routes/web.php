<?php

use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\gradeHorariosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\MensagensSistemaController;

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
Route::get('/logout', [LoginController::class, 'logout']);


Route::resource('professores', ProfessorController::class);

// Rotas do Adminstrador 
Route::group(['middleware' => ['check.jwt.token', 'checkAdminstrador']], function () {

    Route::resource('professores', ProfessorController::class);
    Route::resource('periodos', PeriodoController::class);
    Route::resource('disciplinas', DisciplinaController::class);
    Route::resource('salas', SalaController::class);
    Route::resource('gradeHorarios', gradeHorariosController::class);
});

// Rotas do Professor 
Route::group(['middleware' => ['check.jwt.token', 'checkProfessor']], function () {
    Route::post('docentes/update-password', [ProfessorController::class, 'updatePassword'])->name('docentes.update-password');
    Route::get('/docentes/index/update-password', [LoginController::class, 'IndexUpdatePassword']);
    //  Route::get('homedocentes/home', [ProfessorController::class, 'HomeDocentes'])->name('docentes.home');

    Route::get('editByid/{id}', [DocentesController::class, 'editById'])->name('editByid');
    Route::put('docentes/{professor}', [DocentesController::class, 'update'])->name('docentes.update');
    Route::get('/docentes/home', [DocentesController::class, 'indexHome']);

    Route::get('/enviar-mensagem', [MensagensSistemaController::class, 'criarMensagemFormDocente'])->name('enviar.mensagem.form');
    Route::post('/enviar-mensagem', [MensagensSistemaController::class, 'enviarMensagemDocente'])->name('enviar.mensagem');
    Route::get('/listar-mensagem/{idUsuario}', [MensagensSistemaController::class, 'listarMensagemDocente'])->name('listar.mensagem');

});



require __DIR__ . '/auth.php';
