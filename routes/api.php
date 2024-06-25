<?php

use App\Http\Controllers\Api\KesehatanTipsConntroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::get('/banner', [KesehatanTipsConntroller::class, 'get_data_banner']);
Route::get('/list', [KesehatanTipsConntroller::class, 'get_data_list']);
