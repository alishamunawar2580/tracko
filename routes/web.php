<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboards\MasterSetupDashboardController;
use App\Http\Controllers\Master\DispenserController;
use App\Http\Controllers\Master\MeeterConroller;
use App\Http\Controllers\Master\NozzleController;
use App\Http\Controllers\Master\PricingController;
use App\Http\Controllers\Master\ProductController;
use App\Http\Controllers\Master\TankController;
use App\Http\Controllers\Sales\SaleController;
use App\Http\Controllers\Customers\CustomerController;
use App\Http\Controllers\Suppliers\SupplierController;
use App\Http\Controllers\Purchases\PurchaseController;
use App\Http\Controllers\Accounts\DailyAccountController;
use App\Http\Controllers\Employees\EmployeeController;
use App\Http\Controllers\Employees\PayrollController;
use App\Http\Controllers\Reports\ReportController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'getLogin'])->name('login')->middleware('web');
Route::post('login', [LoginController::class, 'login'])->name('login.post')->middleware('web');
Route::get('fogot-password', [LoginController::class, 'forgotPasswordGet']);
Route::post('forgot-password', [LoginController::class, 'forgotPasswordPost']);

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout.get');

    // Master Setup Module
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

    // Daily Sales Module
    Route::group(['prefix' => 'sales'], function () {
        Route::get('/', [SaleController::class, 'index'])->name('sales.index');
        Route::get('/create', [SaleController::class, 'create'])->name('sales.create');
        Route::post('/create', [SaleController::class, 'store'])->name('sales.store');
        Route::get('/{sale}', [SaleController::class, 'show'])->name('sales.show');
    });

    // Purchase Module
    Route::group(['prefix' => 'purchases'], function () {
        Route::get('/', [PurchaseController::class, 'index'])->name('purchases.index');
        Route::get('/create', [PurchaseController::class, 'create'])->name('purchases.create');
        Route::post('/create', [PurchaseController::class, 'store'])->name('purchases.store');
        Route::get('/{purchase}', [PurchaseController::class, 'show'])->name('purchases.show');
    });

    // Customer Management
    Route::group(['prefix' => 'customers'], function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
        Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
        Route::post('/create', [CustomerController::class, 'store'])->name('customers.store');
        Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
        Route::put('/{customer}', [CustomerController::class, 'update'])->name('customers.update');
        Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    });

    // Supplier Management
    Route::group(['prefix' => 'suppliers'], function () {
        Route::get('/', [SupplierController::class, 'index'])->name('suppliers.index');
        Route::get('/create', [SupplierController::class, 'create'])->name('suppliers.create');
        Route::post('/create', [SupplierController::class, 'store'])->name('suppliers.store');
        Route::get('/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
        Route::put('/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
        Route::delete('/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
    });

    // Daily Accounts
    Route::group(['prefix' => 'accounts'], function () {
        Route::get('/', [DailyAccountController::class, 'index'])->name('accounts.index');
        Route::get('/create', [DailyAccountController::class, 'create'])->name('accounts.create');
        Route::post('/create', [DailyAccountController::class, 'store'])->name('accounts.store');
        Route::get('/{account}', [DailyAccountController::class, 'show'])->name('accounts.show');
    });

    // Employee & Payroll Management
    Route::group(['prefix' => 'employees'], function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
        Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/create', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::put('/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    });

    Route::group(['prefix' => 'payroll'], function () {
        Route::get('/', [PayrollController::class, 'index'])->name('payroll.index');
        Route::get('/create', [PayrollController::class, 'create'])->name('payroll.create');
        Route::post('/create', [PayrollController::class, 'store'])->name('payroll.store');
    });

    // User Management & Roles
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/create', [RoleController::class, 'store'])->name('roles.store');
        Route::delete('/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });

    // Reports Module
    Route::group(['prefix' => 'reports'], function () {
        Route::get('/', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/sales', [ReportController::class, 'salesReport'])->name('reports.sales');
        Route::get('/purchases', [ReportController::class, 'purchasesReport'])->name('reports.purchases');
        Route::get('/stock', [ReportController::class, 'stockReport'])->name('reports.stock');
    });
});

