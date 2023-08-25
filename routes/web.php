<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Models\client;

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

Route::get('/dashboard', function () {
    $clients = ['clients' => client::where('createdby', auth()->user()->id)->get()];
    return view('dashboard', $clients);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/createclient', function () {
    return view('createClient');
});

Route::post('/createclient', "App\Http\Controllers\ClientController@saveClient");


Route::get('/exportclients', "App\Http\Controllers\ExportController@exportCSVFile");
  
Route::post('/deleteclient{id}', [ClientController::class, 'deleteClient'])->name('deleteclient');

Route::post('/registeruser{client}', [RegisteredUserController::class, 'storeFromClient'])->name('registeruser');

// Route::post('/registeruser', "App\Http\Controllers\Auth\RegisteredUserController@storeFromClient");


require __DIR__.'/auth.php';
