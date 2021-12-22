<?php

use App\Http\Controllers\Api\AdminA2Controller;
use App\Http\Controllers\Api\AdminA3Controller;
use App\Http\Controllers\Api\CitizenController;
use App\Http\Controllers\Api\SuperAdminController;
use App\Http\Controllers\Api\UserB1Controller;
use App\Http\Controllers\Api\ProvinceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::prefix('auth')->group(function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::group(['middleware' => 'auth.api'], function () {
        Route::get('get-user', [AuthController::class, 'getUser']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
});

Route::group(['middleware' => ['auth.api', 'role:Super Admin']], function () {
    Route::get('/list-a2', [SuperAdminController::class, 'listA2'])->name('list-admin-a2');
    Route::get('/list-province', [ProvinceController::class, 'getListProvinces'])->name('list-province');
    Route::post('/store-a2', [SuperAdminController::class, 'storeA2'])->name('store-admin-a2');
    Route::put('/update-a2', [SuperAdminController::class, 'updateA2'])->name('update-admin-a2');
});

Route::group(['middleware' => ['auth.api', 'role:Admin A2']], function () {
    Route::post('/store-a3', [AdminA2Controller::class, 'storeA3'])->name('store-admin-a3');
    Route::get('/list-a3', [AdminA2Controller::class, 'listA3'])->name('list-admin-a3');
    Route::put('/update-a2', [AdminA2Controller::class, 'updateA2'])->name('update-admin-a2');
});

Route::group(['middleware' => ['auth.api', 'role:Admin A3']], function () {
    Route::post('/store-b1', [AdminA3Controller::class, 'storeB1'])->name('store-user-b1');
    Route::get('/list-b1', [AdminA3Controller::class, 'listB1'])->name('list-user-b1');
    Route::put('/update-a2', [AdminA3Controller::class, 'updateA2'])->name('update-admin-a2');
});

Route::group(['middleware' => ['auth.api', 'role:Admin A3']], function () {
    Route::post('/store-b1', [AdminA3Controller::class, 'storeB1'])->name('store-user-b1');
    Route::get('/list-b1', [AdminA3Controller::class, 'listB1'])->name('list-user-b1');
});

Route::group(['middleware' => ['auth.api', 'role:User B1']], function () {
    Route::post('/store-b2', [UserB1Controller::class, 'storeB2'])->name('store-user-b2');
    Route::get('/list-b2', [UserB1Controller::class, 'listB2'])->name('list-user-b2');
});

Route::group(['middleware' => ['auth.api', 'role:User B1|User B2']], function () {
    Route::post('/declare-citizen-info', [CitizenController::class, 'declareCitizenInformation'])->name('declare-citizen-info');
});
