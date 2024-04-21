<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TicketController;

//Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [LoginController::class, 'index'])->name('home');
Route::post('/custom-login', [LoginController::class, 'login'])->name('login');
Route::get('/home', [LoginController::class, 'userLogged'])->name('userLogged');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
/* MODULO TICKETS */
Route::get('/tickets', [TicketController::class, 'index'])->middleware('auth');
Route::get('/tickets/create', [TicketController::class, 'create'])->middleware('auth');
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->middleware('auth');

/*Route::get('/', function () {
    return view('welcome');
});*/
/*Route::get('/tickets/{ticket}/{categoria?}', function ($ticket,$categoria = null) {
    if($categoria){
        return "Aqui se mostraran el ticket {$ticket} de la categoria {$categoria}";
    }
    return "Aqui se mostraran el ticket {$ticket} ";
});*/