<?php

use App\Http\Controllers\ApiController;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('json')
    ->prefix('v1')
    ->group(function () {
        Route::get(
            'companies',
            [ApiController::class, "getAllCompany"]
        );

        Route::get(
            'departments/{company_id}',
            [ApiController::class, "getCompanyDepartments"]
        );

        Route::get(
            'employees/{company_id}',
            [ApiController::class, "getCompanyEmployees"]
        );

        Route::get(
            'employees/{company_id}/{department_id}',
            [ApiController::class, "getCompanyDeparmentEmployees"]
        );

        Route::get(
            'employees',
            [ApiController::class, "getEmployees"]
        );
    });
