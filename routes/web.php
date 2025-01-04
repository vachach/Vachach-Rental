<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\HandleInertiaRequests;
use App\Models\User;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);
Route::inertia('/users' , 'Users');

Route::middleware([HandleInertiaRequests::class])->group(function (){
    Route::get('/', function () {
        return Inertia::render('Home');
    });
});

