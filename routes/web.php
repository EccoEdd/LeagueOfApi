<?php

use App\Http\Controllers\AccessController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::prefix('access')->group(function() {
    Route::middleware('signed')->prefix('verify-register')->group(function(){
        Route::get('/{id}', [AccessController::class, 'firstAuthRegister'])
            ->where('id', '[0-9]+')
            ->name('first-Auth');

        Route::post('auth-Register/{id}', [AccessController::class, 'lastAuth'])
            ->where('id', '[0-9]+')
            ->name('last-auth');
    });
});
