<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;

Route::get('/', [HomeController::class, 'index']);

/* MODULO TICKETS */
Route::get('/tickets', [TicketController::class, 'index']);
Route::get('/tickets/create', [TicketController::class, 'create']);
Route::get('/tickets/{ticket}', [TicketController::class, 'show']);

/*Route::get('/', function () {
    return view('welcome');
});*/
/*Route::get('/tickets/{ticket}/{categoria?}', function ($ticket,$categoria = null) {
    if($categoria){
        return "Aqui se mostraran el ticket {$ticket} de la categoria {$categoria}";
    }
    return "Aqui se mostraran el ticket {$ticket} ";
});*/