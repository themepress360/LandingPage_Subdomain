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

// Route::get('/', function () {
//   //  return view('index');
// 	return Redirect::away('https://cwmtechnologies.com/register');

// });

Route::get('/register','SubDomainController@index');

Route::get('/success/{id}', 'SubDomainController@success');


Route::post('/subdomaincreate','SubDomainController@subdomaincreate');

Route::get('/home', 'SubDomainController@landingpage');



