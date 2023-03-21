<?php

// use App\Http\Controllers\DashController;
use App\Http\Controllers\SMController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SKController;
use App\Http\Controllers\PinjamInventController;
use App\Http\Controllers\DetailPinjamController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// // Route::get('/home', [DashController::class, 'index']);
// Route::get('/SM', [SMController::class, 'index']);
// Route::get('/SM/input', [SMController::class, 'input']);
// Route::get('/SM/edit', [SMController::class, 'edit']);

// Route::get('/SK', [SKController::class, 'index']);

// Route::get('/Inventaris', [InventarisController::class, 'index']);
// Route::get('/Inventaris/input', [InventarisController::class, 'input']);
// Route::get('/Inventaris/edit/{id}', [InventarisController::class, 'edit'])->where('id', '[0-9]+');

Route::resource('SM', SMController::class);
Route::resource('SK', SKController::class);
Route::resource('Inventaris', InventarisController::class);
Route::resource('Pinjam', PinjamInventController::class);
Route::resource('Event', EventController::class);

Route::get('DetailPinjam/{id_pinjam}', [DetailPinjamController::class, 'index']);
Route::post('DetailPinjam/store', [DetailPinjamController::class, 'store']);

Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);

Route::get('/', function () {
    return view('welcome');
});