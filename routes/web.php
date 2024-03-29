<?php

use App\Http\Controllers\KemController;
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
    return redirect('/keys-generation');
});

Route::get('/keys-generation', [KemController::class, 'keysGenerationPage']);
Route::post('/keys-generation', [KemController::class, 'keysGeneration']);

Route::get('/encapsulation', [KemController::class, 'encapsulationPage']);
Route::post('/encapsulation', [KemController::class, 'encapsulate']);

Route::get('/decapsulation', [KemController::class, 'decapsulationPage']);
Route::post('/decapsulation', [KemController::class, 'decapsulate']);
