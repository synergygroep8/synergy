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
    return view('welcome');
})->name('home');
/** User data */
/* Login */
Route::get('/login', 'UserController@getLogin')->name('login');

Route::post('/login', 'UserController@postLogin')->name('logmein');
/* Register */
Route::get('/register', 'UserController@getRegister')->name('register');

Route::post('/register', 'UserController@postRegister')->name('registerme');
/* Logout */
Route::get('/logout', 'UserController@getLogout')->name('logout');
/** Main content */
/* Dashboard (for every user) */
Route::get('/dashboard', 'UserController@getDashboard')->middleware('auth')->name('dashboard');
/* Search for companies */
Route::get('/customer/search', 'CustomerController@searchCompany')->middleware('auth')->name('searchcompany');
/* Customer detail page */
Route::get('/customer/{id}', 'CustomerController@show')->middleware('auth')->name('customerdetail');

/*Add Customer*/
Route::get('/customer/create','CustomerController@getCreate');

Route::post('/customer/create','CustomerController@postCreate');

//==============================================INSERT CODE======================================================


/* Search for invoices*/
Route::get('/invoice/search', 'InvoiceController@searchInvoice')->middleware('auth')->name('searchinvoice'); // INSERT CODE
/* Invoice detail page */
Route::get('/invoice/{id}', 'InvoiceController@show')->middleware('auth')->name('invoicedetail');

/* Search for projects */
Route::get('/projects/search', 'ProjectController@searchProjects');
/*show projects list */
Route::get('/projects/list', 'ProjectController@index');
/* Project detail page */
Route::get('/projects/{id}', 'ProjectController@detail');
/* Create invoice from project*/
Route::get('/projects/{id}/invoices/create', 'InvoiceController@getCreate');

//==============================================INSERT CODE======================================================



//============================================


