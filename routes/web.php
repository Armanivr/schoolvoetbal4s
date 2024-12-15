<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PagesController;
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

Route::get('/', [PagesController::class, 'index'])->middleware('auth')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/goalpage', [GoalController::class, 'index']);
    Route::get('/getdata', [ApiController::class, 'getdata']);
    Route::get('/Addpage/{goal}', [GoalController::class, 'AddGoal'])->name('AddGoal');
    Route::post('/goalAdd', [GoalController::class, 'UpdateGoal'])->name('UpdateGoal');

    //homepage
    Route::get('/wedstrijden', [PagesController::class, 'matches'])->name('matches');
    Route::get('/inschrijven', [PagesController::class, 'register'])->name('register');
});

require __DIR__.'/auth.php';
