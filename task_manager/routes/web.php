<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|8000
*/

// Route::get('index', function () {
//     return view('modules.customer.index');
// });

Route::prefix('customer')->group(function(){
    Route::get('/', [CustomerController::class, 'index']);
    Route::get('/create', [CustomerController::class, 'create']);

    Route::get('{id}/show', function ($id) {
        echo $id;
    });

    Route::get('{id}/edit', function () {
        // Hiển thị Form chỉnh sửa thông tin khách hàng
    });

    Route::delete('{id}', function () {
        // Xóa thông tin dữ liệu khách hàng
    });
});

Route::prefix('tasks')->group(function(){
    Route::get('/', [TaskController::class , 'index'])->name('tasks.index');
    Route::get('/create' ,[TaskController::class , 'create'])->name('tasks.create');
    Route::post('/store' ,[TaskController::class , 'store'])->name('tasks.store');
    Route::get('/{taskId}' ,[TaskController::class , 'show'])->name('tasks.show');
    Route::get('/{taskId}/edit' ,[TaskController::class , 'edit'])->name('tasks.edit');
    Route::put('/{taskId}' ,[TaskController::class , 'update'])->name('tasks.update');
    Route::delete('/{photo}' ,[TaskController::class , 'destroy'])->name('tasks.destroy');
});
