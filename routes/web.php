<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboards\MasterSetupDashboardController;
use App\Http\Controllers\Master\DispenserController;
use App\Http\Controllers\Master\MeeterConroller;
use App\Http\Controllers\Master\NozzleController;
use App\Http\Controllers\Master\PricingController;
use App\Http\Controllers\Master\ProductController;
use App\Http\Controllers\Master\TankController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'getLogin'])->name('login')->middleware('web');
Route::post('login', [LoginController::class, 'login'])->name('login.post')->middleware('web');
Route::get('fogot-password', [LoginController::class, 'forgotPasswordGet']);
Route::post('forgot-password', [LoginController::class, 'forgotPasswordPost']);

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    // Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout.get');

    Route::group(['prefix' => 'master'], function () {
        Route::get('/dashboard', [MasterSetupDashboardController::class, 'index'])->name('master.dashboard');

        Route::group(['prefix' => 'product'], function () {
            Route::get('/', [ProductController::class, 'index'])->name('master.product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('master.product.create');
            Route::post('/create', [ProductController::class, 'store'])->name('master.product.store');
        });

        Route::group(['prefix' => 'pricing'], function () {
            Route::get('/', [PricingController::class, 'index'])->name('master.pricing.index');
            Route::get('/create', [PricingController::class, 'create'])->name('master.pricing.create');
        });

        Route::group(['prefix' => 'tank'], function () {
            Route::get('/', [TankController::class, 'index'])->name('master.tank.index');
            Route::get('/create', [TankController::class, 'create'])->name('master.tank.create');
        });

        Route::group(['prefix' => 'dispenser'], function () {
            Route::get('/', [DispenserController::class, 'index'])->name('master.dispenser.index');
            Route::get('/create', [DispenserController::class, 'create'])->name('master.dispenser.create');
        });

        Route::group(['prefix' => 'nozzle'], function () {
            Route::get('/', [NozzleController::class, 'index'])->name('master.nozzle.index');
            Route::get('/create', [NozzleController::class, 'create'])->name('master.nozzle.create');
        });

        Route::group(['prefix' => 'meeter'], function () {
            Route::get('/', [MeeterConroller::class, 'index'])->name('master.meter.index');
            Route::get('/create', [MeeterConroller::class, 'create'])->name('master.meter.create');
        });
    });
});
