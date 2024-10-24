<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DebtorController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

// Route to show the payment index page
Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::get('/payment/process', [PaymentController::class, 'process'])->name('payment.paymentProcess');
Route::get('/payment/list', [PaymentController::class, 'getDebtorList'])->name('debtor.list');

// Authentication routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.show');
Route::post('/register', [UserController::class, 'register'])->name('auth.register');
Route::post('/logout', [UserController::class, 'logout'])->name('auth.logout');

// Dashboard route protected by authentication middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DebtorController::class, 'index'])->name('dashboard');
    Route::post('/debtor/store', [DebtorController::class, 'store'])->name('debtor.store');
    Route::get('/debtor/{id}/edit', [DebtorController::class, 'edit'])->name('debtor.edit');
    Route::put('/debtor/{id}', [DebtorController::class, 'update'])->name('debtor.update');
    Route::delete('/debtor/{id}', [DebtorController::class, 'destroy'])->name('debtor.destroy');

    // payment method
    Route::get('/payment/process/{debtorId}', [PaymentController::class, 'showPaymentForm'])->name('payment.process');
    Route::post('/payment/confirm', [PaymentController::class, 'processPayment'])->name('payment.confirm');
});



