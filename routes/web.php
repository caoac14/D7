<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

// Route of User 
Route::group(['prefix' => 'KL', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', [RoomController::class, 'index'])->name('dashboard');
    Route::get('/room/{id}', [DeviceController::class, 'deviceOfRoom']);
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    // Route::get('/seachDevice', [ReportController::class, 'seachDevice'])->name('seachDevice');
    Route::post('/showDevice', [ReportController::class, 'showDevice'])->name('showDevice');
    Route::post('/getDataReport', [ReportController::class, 'getDataReport'])->name('getDataReport');

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route of Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/', [AdminController::class, 'showHomePage'])->name('admin.home');

    Route::get('/report', [AdminController::class, 'showReportPage'])->name('admin.report');
    Route::get('/detail_report/{id}', [AdminController::class, 'showDetailReportPage'])->name('admin.report_detail');

    Route::get('/device', [AdminController::class, 'showDevicePage'])->name('admin.device');

    Route::get('/chart', [AdminController::class, 'showDevicePage'])->name('admin.chart');

    Route::get('/account', [AdminController::class, 'showAccountPage'])->name('admin.account');
    Route::get('/detail_account', [AdminController::class, 'showDetailAccountPage'])->name('admin.account_detail');
    Route::get('/register_account', [AdminController::class, 'showRegisterAccount'])->name('admin.register_account');
    Route::post('/create_account', [AdminController::class, 'postRegisterAccount'])->name('admin.create_account');
    Route::post('/update_account/{id}', [AdminController::class, 'updateAccount'])->name('admin.update_account');
    Route::get('/reset_password/{id}', [AdminController::class, 'resetPassword'])->name('admin.reset_password');

    Route::get('/send-mail', [AdminController::class, 'sendMail'])->name('admin.send_mail');

});


require __DIR__.'/auth.php';