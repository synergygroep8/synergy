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
Route::get('/customers/search', 'CustomerController@searchCompany')->middleware('auth')->name('searchcompany');

/*Add Customer*/
Route::get('/customers/create','CustomerController@getCreate')->name('createcustomer');

Route::post('/customers/create','CustomerController@postCreate');

/* Customer detail page */
Route::get('/customers/{id}', 'CustomerController@show')->middleware('auth')->name('customerdetail');


//==============================================INSERT CODE======================================================

Route::get('/invoices', function() {
    return redirect()->route('dashboard');
});

Route::get('/customers', function() {
    return redirect()->route('dashboard');
});

Route::get('/users', function() {
    return redirect()->route('dashboard');
});
/* Search for invoices*/
Route::get('/invoices/search', 'InvoiceController@searchInvoice')->middleware('auth')->name('searchinvoice'); // INSERT CODE
/* Invoice detail page */
Route::get('/invoices/{id}', 'InvoiceController@show')->middleware('auth')->name('invoicedetail');


/* Search for projects */
Route::get('/projects/search', 'ProjectController@searchProjects');
/*show projects list */
Route::get('/projects/list', 'ProjectController@index');
/* Project detail page */
Route::get('/projects/{pid}/invoices/{id}/edit', 'InvoiceController@edit');

Route::post('/projects/{pid}/invoices/{id}', 'InvoiceController@postEdit')->name('editInvoice');

Route::get('/projects/{id}/invoices/create', 'InvoiceController@getCreate');

Route::post('/projects/{id}/invoices', 'InvoiceController@store')->name('createInvoice');

Route::get('/projects/{id}/invoices', 'InvoiceController@index')->name('listInvoice');

Route::get('/projects/{pid}/invoices/{id}', 'InvoiceController@showFromProject');

Route::get('/projects/create', 'ProjectController@create')->name('createProject');

Route::post('/projects', 'ProjectController@store')->name('ProjectStore');


Route::get('/projects/{id}', 'ProjectController@show')->name('projectshow');

Route::get('/users/create', 'UserController@create')->name('createUser');

Route::post('/users', 'UserController@store')->name('storeUser');

Route::get('/users/{id}/edit', 'UserController@edit')->name('editUser');

Route::put('/users', 'UserController@put')->name('putUser');

Route::get('/users/search', 'UserController@searchUsers')->name('searchuser');

Route::get('/users/{id}', 'UserController@show')->name('showuser');
/* Create invoice from project*/


//==============================================INSERT CODE======================================================



//============================================


