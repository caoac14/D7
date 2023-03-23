<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExportExcel;
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
    return view('auth.login');
});
Route::get('/redirect_back', [UserController::class, 'redirectBack'])->name('redirect_back');

// Route of User 
Route::group(['prefix' => 'KL', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', [UserController::class, 'showGroupRoom'])->name('dashboard');
    Route::get('/typeRoom/{id?}', [UserController::class, 'showTypeRoom'])->name('KL.show_typeroom');
    Route::get('/room/{id?}', [UserController::class, 'showRoom'])->name('KL.show_room');
    Route::get('/device/{roomId?}/{typeDeviceId?}', [UserController::class, 'showDevice'])->name('KL.show_device');
    Route::get('/report', [UserController::class, 'pageReport'])->name('KL.report');
    Route::post('/editReport/{id}', [UserController::class, 'editReport'])->name('KL.editReport');
    Route::get('/deleteReport/{id}', [UserController::class, 'deleteReport'])->name('KL.deleteReport');
    Route::get('/showRoomAjax', [UserController::class, 'showRoomAjax'])->name('KL.showRoomAjax');
    Route::get('/showImage', [UserController::class, 'showImage'])->name('KL.showImage');
    Route::get('/showDeviceAjax', [UserController::class, 'showDeviceAjax'])->name('KL.showDeviceAjax');

    Route::post('/setDataReport', [UserController::class, 'setDataReport'])->name('KL.setDataReport');

    Route::post('/problemReport/{id?}', [UserController::class, 'problemReport'])->name('KL.problem_report');
});

Route::get('create_admin', [AdminController::class, 'createAdmin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profileAdmin', [ProfileAdminController::class, 'edit'])->name('admin.profileAdmin');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route of Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/', [AdminController::class, 'showHomePage'])->name('admin.home');


    Route::post('update_status_problem/{id}', [AdminController::class, 'updateStatusProblem'])->name('admin.update_status_problem');

    Route::get('/report', [AdminController::class, 'showReportPage'])->name('admin.report');
    Route::get('/detail_report/{id}', [AdminController::class, 'showDetailReportPage'])->name('admin.report_detail');
    Route::post('/delete_report/{id}', [AdminController::class, 'deleteReport'])->name('admin.delete_report');
    Route::post('upload_status/{id}', [AdminController::class, 'updateStatus'])->name('admin.update_status');

    Route::get('/device', [AdminController::class, 'showDevicePage'])->name('admin.device');
    Route::get('/device_detail/{roomId?}/{typeDeviceId?}', [AdminController::class, 'showDeviceDetail'])->name('admin.device_detail');


    Route::get('/room/{id}', [AdminController::class, 'showDeviceOfRoom'])->name('admin.device_of_room');
    Route::post('/add_room', [AdminController::class, 'addRoom'])->name('admin.add_room');
    Route::post('/add_device/{roomId}/{typeDeviceId}', [AdminController::class, 'addDevice'])->name('admin.add_device');
    Route::post('/add_typedevice', [AdminController::class, 'addTypeDevice'])->name('admin.add_typedevice');
    Route::post('/delete_device/{id}', [AdminController::class, 'deleteDevice'])->name('admin.delete_device');
    Route::post('/upload_image_room/{id}', [AdminController::class, 'uploadImageRoom'])->name('admin.upload_image_room');
    Route::post('/edit_room/{id}', [AdminController::class, 'editRoom'])->name('admin.edit_room');

    Route::post('/add_groupRoom', [AdminController::class, 'addGroupRoom'])->name('admin.add_groupRoom');
    Route::get('/group_room/{id}', [AdminController::class, 'showGroupRoom'])->name('admin.group_room');


    Route::get('/chart', [AdminController::class, 'showChartPage'])->name('admin.chart');

    Route::get('/account', [AdminController::class, 'showAccountPage'])->name('admin.account');
    Route::get('/detail_account', [AdminController::class, 'showDetailAccountPage'])->name('admin.account_detail');
    Route::get('/register_account', [AdminController::class, 'showRegisterAccount'])->name('admin.register_account');
    Route::post('/create_account', [AdminController::class, 'postRegisterAccount'])->name('admin.create_account');
    Route::post('/update_account/{id}', [AdminController::class, 'updateAccount'])->name('admin.update_account');
    Route::get('/reset_password/{id}', [AdminController::class, 'resetPassword'])->name('admin.reset_password');

    Route::get('/send-mail', [AdminController::class, 'sendMail'])->name('admin.send_mail');

    Route::post('/export_report/{id?}', [ExportExcel::class, 'exportReport'])->name('admin.export_report');

    Route::get('/infor', [AdminController::class, 'showInfor'])->name('admin.infor');


    Route::post('/download_pdf', [AdminController::class, 'downloadPDF'])->name('admin.download_pdf');

    Route::get('/division', [AdminController::class, 'showDivisionPage'])->name('admin.division');
    Route::post('/updateDivision', [AdminController::class, 'updateDivision'])->name('admin.updateDivision');
});


require __DIR__ . '/auth.php';
