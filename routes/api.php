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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('register/{user}', 'UsersController@register');

Route::resource('users', 'UsersController');
Route::resource('cities', 'CitiesController');
Route::resource('states', 'StatesController');
Route::resource('departments', 'DepartmentsController');
Route::resource('reports', 'ReportsController');
Route::resource('reports-status', 'ReportsStatusController');
Route::resource('users-employees', 'UsersEmployeesController');
Route::resource('status', 'StatusController');
Route::resource('roles', 'RolesController');
Route::resource('types-departments', 'TypesOfDepartmentsController');
