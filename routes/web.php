<?php

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
    return 'This is not a route that you can see bb';
});

// App\User::create([
//     'first_name'=>'hernan',
//     'last_name'=>'camacho',
//     'email'=>'hernan@hernan.com',
//     'password'=>bcrypt('hernan')
// ]);
