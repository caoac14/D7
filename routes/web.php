<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ReportController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'KL', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', [RoomController::class, 'index'])->name('dashboard');
    Route::get('/room/{id}', [DeviceController::class, 'deviceOfRoom']);
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::post('/showDevice', [ReportController::class, 'showDevice'])->name('showDevice');
    Route::get('/seachDevice', [ReportController::class, 'seachDevice'])->name('seachDevice');

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::view('/', 'admin.dashboard');
});

//test

Route::get('/device', function () {
    return view('user.pages.device');
})->name('device');

require __DIR__.'/auth.php';
