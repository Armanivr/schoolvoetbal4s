<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
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

Route::get('/', [PagesController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/goalpage', [GoalController::class, 'index']);
    Route::get('/getdata', [ApiController::class, 'getdata'])->middleware('auth');
    Route::get('/Addpage/{goal}', [GoalController::class, 'AddGoal'])->name('AddGoal')->middleware('auth');
    Route::post('/goalAdd', [GoalController::class, 'UpdateGoal'])->name('UpdateGoal')->middleware('auth');
    Route::get('/costumerInfo', function(){
        view('costumerInfo');
    })->middleware('auth')->name('info');


    //homepage
    Route::get('/wedstrijden', [PagesController::class, 'matches'])->name('matches');
    Route::get('/inschrijven', [PagesController::class, 'register'])->name('register')->name('team.register');

    Route::post('/teamRegister', [TeamController::class, 'addTeams'])->name('team.register')->middleware('auth');

    Route::get('/memberRegister', [TeamController::class, 'createMember'])->name('createMember')->middleware('auth');
    Route::post('/memberRegister', [TeamController::class, 'addMember'])->name('addMember')->middleware('auth');

    Route::get('/adminPanel', [PagesController::class, 'adminPanel'])->name('adminPanel')->middleware('auth');

    //tournament aanmaken
    Route::get('/tournament/create', [MatchController::class, 'create'])->name('tournament.create')->middleware('auth');
    Route::post('/tournament/create', [MatchController::class, 'store'])->name('tournament.store')->middleware('auth');

    //tournament beheren
    Route::get('/tournament/manage', [MatchController::class, 'manage'])->name('tournament.manage')->middleware('auth');
    Route::patch('/tournament/update/{tournament}', [MatchController::class, 'update'])->name('tournament.update')->middleware('auth');
    Route::delete('/tournament/delete/{tournament}', [MatchController::class, 'destroy'])->name('tournament.destroy')->middleware('auth');
    //tournament laten zien
    Route::get('/tournament/{tournament}', [MatchController::class, 'show'])->name('tournament.show')->middleware('auth');

    //Team beheren
    Route::get('/team/show', [TeamController::class, 'show'])->name('team.show')->middleware('auth');
    Route::patch('/team/update/{team}', [TeamController::class, 'update'])->name('team.update')->middleware('auth');
});

require __DIR__.'/auth.php';