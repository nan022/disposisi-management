<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\MonitorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin Routes
    Route::middleware('role:admin')->group(function() {
        Route::resource('users', UserController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('agenda', AgendaController::class);
    });

    // Sekretaris Routes
    Route::middleware('role:sekretaris')->group(function() {
        Route::resource('disposisi', DisposisiController::class);
        Route::resource('agenda', AgendaController::class);
    });

    // Pimpinan Routes
    Route::middleware('role:pimpinan')->group(function() {
        Route::get('/monitor', [MonitorController::class, 'index'])->name('monitor.index');
        Route::get('/monitor/agenda', [MonitorController::class, 'agenda'])->name('monitor.agenda');
        Route::get('/monitor/disposisi/tim/{team}', [MonitorController::class, 'disposisiByTeam'])->name('monitor.disposisi.team');
    });

    // Ketua Tim Routes
    Route::middleware('role:ketua_tim')->group(function() {
        Route::get('/tim/disposisi', [DisposisiController::class, 'timIndex'])->name('tim.disposisi');
        Route::get('/tim/disposisi/{disposisi}/edit', [DisposisiController::class, 'timEdit'])->name('tim.disposisi.edit');
        Route::put('/tim/disposisi/{disposisi}', [DisposisiController::class, 'timUpdate'])->name('tim.disposisi.update');
        Route::get('/tim/disposisi/{disposisi}', [DisposisiController::class, 'timShow'])->name('tim.disposisi.show');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
