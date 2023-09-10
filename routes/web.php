<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
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


/*
| Order
*/
Route::get('/', [OrderController::class, 'index'])->name('order.index');
Route::post('/submit-order', [OrderController::class, 'submitOrder'])->name('submit.order');

/*
| Payment
*/
Route::get('/payment-page/{order_token}', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/make-payment/{order_token}', [PaymentController::class, 'makePayment'])->name('make.payment');

