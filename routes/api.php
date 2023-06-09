<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Middleware\AuthWithBearerToken;
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

Route::post('/auth/register', [ AuthController::class, 'register' ]);
Route::post('/auth/login', [ AuthController::class, 'login' ]);

Route::get('/shop/products', [ ShopController::class, 'getProducts' ])
    ->middleware(AuthWithBearerToken::class);
