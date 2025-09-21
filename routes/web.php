<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\IdentitasController;

// ==== LOGIN ====
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.post');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

// ==== PROTECTED ROUTES ====
Route::middleware(['auth.session'])->group(function(){

    Route::get('/', fn()=>redirect()->route('dashboard'));
    Route::get('/dashboard', fn()=>view('dashboard'))->name('dashboard');

    // Users (hanya Admin)
    Route::resource('users', UserController::class)->middleware('role:Admin');

    // Customers
    Route::resource('customers', CustomerController::class);

    // Items
    Route::resource('items', ItemController::class);
     // Sales
    Route::get('sales',[SalesController::class,'index'])->name('sales.index');
    Route::get('sales/create',[SalesController::class,'create'])->name('sales.create');
   Route::post('sales/add-temp',[SalesController::class,'addTemp'])->name('sales.addTemp');

    Route::post('sales/store',[SalesController::class,'store'])->name('sales.store');
    Route::get('sales/{sale}',[SalesController::class,'show'])->name('sales.show');

    // Transactions
    Route::get('transactions',[TransactionController::class,'index'])->name('transactions.index');
    Route::get('transactions/{transaction}',[TransactionController::class,'show'])->name('transactions.show');
    Route::delete('transactions/{transaction}',[TransactionController::class,'destroy'])->name('transactions.destroy');

    // Identitas (Admin saja)
    Route::get('identitas',[IdentitasController::class,'index'])->name('identitas.index')->middleware('role:Admin');
    Route::get('identitas/{identitas}/edit',[IdentitasController::class,'edit'])->name('identitas.edit')->middleware('role:Admin');
    Route::put('identitas/{identitas}',[IdentitasController::class,'update'])->name('identitas.update')->middleware('role:Admin');
});
