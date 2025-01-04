<?php

use App\Http\Controllers\TestController;
use App\Mail\HelloWorld;
use App\Mail\MailgunEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('welcome');
});
Route::get('/{pathMatch}', function () {
    return view('welcome');
})->where('pathMatch', "./name*");
Route::get('/mail', function () {
    $mail = new HelloWorld(name: 'abdelkader');
    Mail::to('abdelkaderrefaat@gmail.com')->send($mail);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/test',TestController::class);//->middleware('auth:sanctum');
Route::get('send-mail', function(){
    Mail::to('abdelkaderrefaat@gmail.com')->send(new MailgunEmail('Hi there i am from mail provider of laravel'));
    return 'mail sent successfuly';
});

