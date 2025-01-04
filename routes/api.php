<?php
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/users', function (Request $request) {
    return $request->user();
});
Route::middleware([HandleInertiaRequests::class])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Home');
    });
});
