<?php

use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\OrderController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
});


Route::controller(CategoryController::class)->group(function () {
    Route::get('/all/category', 'AllCategory')->name('all.category');
    Route::get('/add/category', 'AddCategory')->name('add.category');
    Route::post('/store/category', 'StoreCategory')->name('store.category');
    Route::get('/category/edit/{id}', 'EditCategory')->name('edit.category');
    Route::patch('/update/category/{id}', 'UpdateCategory')->name('update.category');
    Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
});


Route::controller(CustomerController::class)->group(function () {
    Route::get('/all/customer', 'AllCustomer')->name('all.customer');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/all/order', 'AllOrder')->name('all.order');
    Route::get('/order/approve/{id}', 'ApproveOrder')->name('order.approve');

    Route::get('/order/reject/{id}', 'RejectOrder')->name('order.reject');

    Route::get('/chat/view/{id}', 'ChatPage')->name('chat.view');
    Route::get('/chat/list', 'ChatList')->name('chat.list');
    Route::post('/send/message', 'SendMessage')->name('send.message');
});