<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\BillInfoController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\RevenueController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Frontend\CommentController as FrontendCommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');
Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
Route::get('/reservation/step-one', [FrontendReservationController::class, 'stepOne'])->name('reservations.step.one');
Route::post('/reservation/step-one', [FrontendReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
Route::get('/reservation/step-two', [FrontendReservationController::class, 'stepTwo'])->name('reservations.step.two');
Route::post('/reservation/step-two', [FrontendReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');
Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::resource('/comments', FrontendCommentController::class);

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/tables', TableController::class);
    Route::resource('/reservations', ReservationController::class);
    Route::get('/pay', [TableController::class, 'tableBill'])->name('tables.bill');
    Route::get('/pay/{table}', [MenuController::class, 'menuBill'])->name('menu.bill');
    Route::get('/pay/{table}/{bill}/{menu}', [BillInfoController::class, 'check'])->name('billinfo');
    Route::delete('/pay/{table}/{bifid}', [BillInfoController::class, 'delete'])->name('billinfo.delete');
    Route::put('/pay/{table}/add/{bifid}', [BillInfoController::class, 'add'])->name('billinfo.add');
    Route::put('/pay/{table}/sub/{bifid}', [BillInfoController::class, 'sub'])->name('billinfo.sub');
    Route::get('/invoice/{table}/{bill}', [BillController::class, 'invoice'])->name('bill.invoice');
    Route::get('/invoice/pdf/{table}/{bill}', [BillController::class, 'pdf'])->name('bill.invoice.pdf');
    Route::put('/invoice/paid/{billid}', [BillController::class, 'pay'])->name('bill.invoice.paid');
    Route::put('/comment/{commentid}', [CommentController::class, 'change'])->name('comment.change');
    Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
    Route::get('/revenue/{year}', [RevenueController::class, 'index'])->name('revenue.index');
});

require __DIR__ . '/auth.php';
