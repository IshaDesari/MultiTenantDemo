<?php

declare(strict_types=1);

use App\Http\Controllers\App\ProfileController;
use App\Http\Controllers\App\UserController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

use App\Http\Controllers\App\RoleController;
use App\Http\Controllers\App\PermissionController;
use App\Http\Controllers\App\AppointmentController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    /*
    Route::get('/', function () {
        dd(tenant()->toArray());
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
    */

    Route::get('/', function () {
        return view('app.auth.login');
    });


    Route::get('/dashboard', function () {
        return view('app.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('tenant.profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('tenant.profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('tenant.profile.destroy');

        // Route::group(['middleware' => ['role:admin']], function () {
            Route::resource('users', UserController::class);
            
            
            Route::resource('roles', RoleController::class);
            Route::resource('permissions', PermissionController::class);
            
            
        // });
        // Route::group(['middleware' => ['role:patient']], function () {
                Route::resource('appointments', AppointmentController::class);
        // });
    });

    require __DIR__ . '/tenant-auth.php';
});