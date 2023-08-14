<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
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


Route::as('employee.')->prefix('/employee')->middleware(['auth'])->group(callback: function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //requests
    Route::get('/', [\App\Http\Controllers\LeaveRequestController::class, 'index'])->name('index');
    Route::get('/requests/create', [\App\Http\Controllers\LeaveRequestController::class, 'create'])
        ->name('requests.create');
    Route::post('/requests', [\App\Http\Controllers\LeaveRequestController::class, 'store'])
    ->name('requests.store');


});


Route::name('admin.')->prefix('admin')->group(function(){

    Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, 'loginForm'])
        ->name('loginFrom')->middleware('guest:admin');
    Route::post('/login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])
        ->name('login');
    Route::post('/logout', [\App\Http\Controllers\Admin\LoginController::class, 'logout'])
        ->name('logout');
});

Route::middleware(['auth:admin'])->prefix('/admin')->as('admin.')->group(function () {
    //dashboard
    Route::get('/', DashboardController::class)->name('index');


    Route::resources([
        'employees' => \App\Http\Controllers\Admin\EmployeeController::class,
    ]);

    Route::resource('leaves', \App\Http\Controllers\Admin\LeaveController::class)
        ->except('show')
        ->parameter('leaves', 'leave');


    //leave Requests
    Route::get('/leaveRequests', [\App\Http\Controllers\Admin\LeaveRequestController::class, 'index'])
        ->name('leaveRequests.index');
    Route::get('/leaveRequests/{employee}/{leave}', [\App\Http\Controllers\Admin\LeaveRequestController::class, 'show'])
        ->name('leaveRequests.show');
    Route::put('/leaveRequests/{employee}/{leave}', [\App\Http\Controllers\Admin\LeaveRequestController::class, 'update'])
        ->name('leaveRequests.update');


});

require __DIR__ . '/auth.php';
