<?php

use Illuminate\Http\Request;

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

// get a suggest category
Route::get('suggcategory/{id}','CategoryController@suggest');

// get list of budget requests
Route::get('reqbudget','ReqBudgetController@index');

// delete a budget request
Route::delete('reqbudget/{id}','ReqBudgetController@destroy');

// publish existing and pending budget request
Route::put('pubbudget/{id}','ReqBudgetController@publish');

// update existing and pending budget request
Route::put('reqbudget/{id}','ReqBudgetController@store');

// create new budget request
Route::post('reqbudget','ReqBudgetController@store');
