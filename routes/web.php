<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\QuestionController;
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



Route::get('/', [AppController::class, 'index'])-> name('app.index');

//Панель администратора

Route::prefix('admin')->middleware('is_admin')->group(function(){

    Route::get('/', [QuestionController::class, 'index'])->name('admin.index');
    Route::get('create', [QuestionController::class, 'create'])->name('admin.create-question');
    Route::post('create', [QuestionController::class, 'store'])->name('admin.store-question');
    Route::get('edit/{questionId}', [QuestionController::class, 'edit'])->name('admin.edit-question');
    Route::put('edit/{questionId}', [QuestionController::class, 'update'])->name('admin.update-question');
    Route::delete('delete/{questionId}', [QuestionController::class, 'delete'])->name('admin.delete-question');
    Route::get('design', [DesignController::class, 'index'])->name('admin.design');
    Route::get('design/top/{px}', [DesignController::class, 'changePaddingTop'])->name('admin.changePaddingTop');
    Route::get('design/bottom/{px}', [DesignController::class, 'changePaddingBottom'])->name('admin.changePaddingBottom');
});

Route::middleware(['guest'])->group(function(){
    Route::get('registration', [AuthController::class, 'registrationUser'])-> name('user.page-registration');
    Route::post('registration', [AuthController::class, 'storeUser'])-> name('user.registration');
    Route::get('login', [AuthController::class, 'loginPage'])-> name('user.page-login');
    Route::post('login', [AuthController::class, 'loginUser'])-> name('user.login');
});


Route::post('logout', [AuthController::class, 'logout'])->name('user.logout');

