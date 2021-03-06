<?php

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

Route::get('/','App\Http\Controllers\DashboardController@indexAction');
Route::get('/addpart','App\Http\Controllers\PartController@addPart');
Route::post('/addpart','App\Http\Controllers\PartController@addPart');
Route::get('/addInsurance','App\Http\Controllers\InsuranceController@actionAddinsurance'); 
Route::get('/insurance','App\Http\Controllers\InsuranceController@viewList');