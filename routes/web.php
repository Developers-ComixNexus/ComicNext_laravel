<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;


Route::get('/', function () {
    return view('Registro');
});
//Route::post('/',[RegistroController::class, 'register']);
//Route::get('/RegistroComics',[RegistroController::class, 'register']);
Route::post('/', [RegistroController::class, 'register'])->name('computer');

Route::get('send-mail', function () {
    $details = [
        'title' => 'Success',
        'content' => 'This is an email testing using Laravel-Brevo',
    ];
   
    \Mail::to('202103856@est.umss.edu')->send(new \App\Mail\TestMail($details));
   
    return 'Email sent at ' . now();
});