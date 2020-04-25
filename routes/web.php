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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/adddoctor',"Doctorcontroller@index");
Route::post('/getsubspeciality',"Doctorcontroller@getsubspeciality");
Route::post('/defaultServices',"ServiceController@getdefaultServices");
Route::post('/addonServices',"ServiceController@getaddonServices");

Route::get('/get_speciality_areas_of_interest',"ServiceController@get_speciality_areas_of_interest");
Route::get('/get_add_on_areas_of_interest',"ServiceController@get_add_on_areas_of_interest");
Route::post('/get_procedures_by_speciality',"ServiceController@get_procedures_by_speciality");

Route::post('/adddoctor',"Doctorcontroller@savedoctor");
