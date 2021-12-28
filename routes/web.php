<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
        Route::get('/company-create', [CompanyController::class, 'create'])->name('company-create');
        Route::post('/company-store', [CompanyController::class, 'store'])->name('company-store');
        Route::get('/company/{company_id}', [CompanyController::class, 'show'])->name('company-show');

        Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');
        Route::get('/department-create', [DepartmentController::class, 'create'])->name('department-create');
        Route::post('/department-store', [DepartmentController::class, 'store'])->name('department-store');

        Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
        Route::get('/employee-create', [EmployeeController::class, 'create'])->name('employee-create');
        Route::post('/employee-store', [EmployeeController::class, 'store'])->name('employee-store');
    });

require __DIR__ . '/auth.php';
