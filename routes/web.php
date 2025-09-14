<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpdController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
require __DIR__.'/auth.php';

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

        Route::get('/dataopd', [OpdController::class, 'index']);
        Route::post('/opd', [OpdController::class, 'store'])->name('opd.store');
        Route::get('/opd/{id}/get-data', [OpdController::class, 'getData'])->name('opd.get-data');
        Route::get('/opd/{id}/edit', [OpdController::class, 'edit'])->name('opd.edit');
        Route::put('/opd/{id}', [OpdController::class, 'update'])->name('opd.update');
        Route::post('/opd/{id}', [OpdController::class, 'update']);
        Route::delete('/opd/{id}', [OpdController::class, 'destroy'])->name('opd.destroy');
        #Route::delete('opd/{id}', 'OpdController@destroy')->name('opd.destroy');
        Route::get('/master-data', [MasterDataController::class, 'index']);

});
