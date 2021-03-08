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
    return view('index');
});

Route::get('/register','SubDomainController@index');
Route::get('/success/{id}', 'SubDomainController@success');

Route::post('/subdomaincreate','SubDomainController@subdomaincreate');
Route::post('/subdomainuserlogin','SubDomainController@subdomainuserlogin');

Route::get('/landingpage', 'SubDomainController@landingpage');
Route::get('/successlogin/{id}', 'SubDomainController@successlogin');

Route::get('/super-admin','SuperAdminController@index');

Route::post('/login', 'SuperAdminController@SuperAdminLogin');

Route::get('/all-subdomains', 'SuperAdminController@ShowAllSubDomains');
