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

use \App\Http\Middleware\CheckRole;

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
Route::get('/dashboard', 'UserController@getDashboard')->middleware('auth', 'role:0,1,2,3')->name('dashboard');
/* Search for companies */
Route::get('/customers/search', 'CustomerController@searchCompany')->middleware('auth', 'role:0,1,2,3')->name('searchcompany');

/*Add Customer*/
Route::get('/customers/create','CustomerController@getCreate')->middleware('auth', 'role:0,2')->name('createcustomer');

Route::post('/customers/create','CustomerController@postCreate')->middleware('auth', 'role:0,2');


///routs voor get edit voor put edit.

Route::get('/customers/{id}/edit','CustomerController@edit')->middleware('auth', 'role:0,1,2')->name('editCostumer');

Route::put('/customers/{id}', 'CustomerController@put')->middleware('auth', 'role:0,1,2')->name('putCostumer');


/* Customer detail page */
Route::get('/customers/{id}', 'CustomerController@show')->middleware('auth', 'role:0,1,2,3')->name('customerdetail');


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
Route::get('/invoices/search', 'InvoiceController@searchInvoice')->middleware('auth', 'role:0,1,2')->name('searchinvoice'); // INSERT CODE
/* Invoice detail page */
Route::get('/invoices/{id}', 'InvoiceController@show')->middleware('auth', 'role:0,1,2')->name('invoicedetail');

Route::get('/invoices/{id}/delete', 'InvoiceController@verifyDelete')->middleware('auth', 'role:0,1');

Route::delete('/invoices/{id}/delete', 'InvoiceController@destroy')->middleware('auth', 'role:0,1');
/* Search for projects */
Route::get('/projects/search', 'ProjectController@searchProject')->middleware('auth', 'role:0,1,2,3')->name('searchproject');
/*show projects list */
Route::get('/projects/list', 'ProjectController@index')->middleware('auth', 'role:0,1,2,3');
/* Project detail page */
Route::put('/projects/{pid}/invoices/{id}', 'InvoiceController@put')->middleware('auth', 'role:0,1')->name('putInvoice');

Route::get('/projects/{pid}/invoices/{id}/edit', 'InvoiceController@edit')->middleware('auth', 'role:0,1')->name('editInvoice');

//Route::post('/projects/{pid}/invoices/{id}', 'InvoiceController@postEdit')->name('editInvoice');

Route::get('/projects/{id}/invoices/create', 'InvoiceController@getCreate')->middleware('auth', 'role:0,1');

Route::post('/projects/{id}/invoices', 'InvoiceController@store')->middleware('auth', 'role:0,1')->name('createInvoice');

Route::get('/projects/{id}/invoices', 'InvoiceController@projectIndex')->middleware('auth', 'role:0,1')->name('listInvoice');

Route::get('/projects/{pid}/invoices/{id}', 'InvoiceController@showFromProject')->middleware('auth', 'role:0,1')->name('invoiceprojectshow');

Route::get('/projects/create', 'ProjectController@create')->middleware('auth', 'role:0,1')->name('createProject');

Route::post('/projects', 'ProjectController@store')->middleware('auth', 'role:0,1,2')->name('ProjectStore');

Route::get('/projects/{id}/delete', 'ProjectController@verifyDelete')->middleware('auth', 'role:0,1,2')->name('projectDelete');

Route::delete('/projects/{id}/delete', 'ProjectController@destroy')->middleware('auth', 'role:0,1,2')->name('projectDestroy');

Route::put('/projects/{id}','ProjectController@put')->middleware('auth', 'role:0,1,2')->name('ProjectPut');

Route::get('/projects/{id}/edit', 'ProjectController@edit')->middleware('auth', 'role:0,1,2')->name('projectEdit'); //werkt

Route::get('/projects/{id}', 'ProjectController@show')->middleware('auth', 'role:0,1,2,3')->name('projectshow');

Route::get('/users/create', 'UserController@create')->middleware('auth', 'role:0')->name('createUser');

Route::post('/users', 'UserController@store')->middleware('auth', 'role:0')->name('storeUser');

Route::get('/users/{id}/edit', 'UserController@edit')->middleware('auth', 'role:0')->name('editUser');

Route::put('/users', 'UserController@put')->middleware('auth', 'role:0')->name('putUser');

Route::get('/users/search', 'UserController@searchUsers')->middleware('auth', 'role:0')->name('searchuser');

Route::get('/users/{id}', 'UserController@show')->middleware('auth', 'role:0')->name('showuser');
/* Create invoice from project*/


//==============================================INSERT CODE======================================================



//============================================


