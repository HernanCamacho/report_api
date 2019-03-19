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
// Route::post('save-image', 'ReportsController@saveImage');
Route::get('users-report', function(){
    return \App\User::with('report')->get();
});

Route::get('status-report', function(){
    return \App\Status::with('report')->get();
});

Route::get('report-rp-attended', function(){
    return \App\Report::with('rpAttended')->get();
});

Route::get('us-emp-rp-att', function(){
    return \App\UserEmployee::with('rpAttended')->get();
});

Route::resource('users', 'UsersController');
Route::resource('cities', 'CitiesController');
Route::resource('states', 'StatesController');
Route::resource('departments', 'DepartmentsController');
Route::resource('reports', 'ReportsController');
Route::resource('reports-attended', 'ReportsAttendedController');
Route::resource('users-employees', 'UsersEmployeesController');
Route::resource('status', 'StatusController');
Route::resource('roles', 'RolesController');
Route::resource('types-departments', 'TypesOfDepartmentsController');
