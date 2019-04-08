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

Route::get('/', 'PageController@getHome');

Route::get('/login', 'PageController@getLogin');

Route::get('/employecrud', 'PageController@getEmployeCRUD');

Route::get('/companycrud', 'PageController@getCompanyCRUD');

Route::get('/basic', 'PageController@getBasic');

Route::get('/welcome', function () {
    return view('welcome');
});

//login

Route::post('/login/submit', 'LoginController@login');

Route::get('/login/successlogin','LoginController@successlogin');

Route::get('/logout','LoginController@logout');


//Employee

Route::get('/employelist', 'EmployeController@viewEmploye');

Route::post('/employelist/addnew', 'EmployeController@newEmploye');

Route::get('/employelist/delete/{id}', array('as'=>'deleteEmploye',function($id){
    return View::make('deleteEmploye')->with('employe',App\Employe::find($id));
}));

Route::get('/employelist/delete/id/{id}','EmployeController@delete');

Route::get('/employelist/edit/{id}', array('as'=>'editEmploye',function($id){
    return View::make('editEmploye')->with('employe',App\Employe::find($id));
}));

Route::post('/employelist/edit/{id}', 'EmployeController@edit');

//Company

Route::get('/companylist', 'CompanyController@viewCompany');

//Route::post('/companylist/addnew', 'CompanyController@newCompany');

Route::get('/companylist/delete/{id}', array('as'=>'deleteCompany',function($id){
    return View::make('deleteCompany')->with('company',App\Company::find($id));
}));

Route::get('/companylist/delete/id/{id}','CompanyController@delete');

Route::get('/companylist/edit/{id}', array('as'=>'editCompany',function($id){
    return View::make('editCompany')->with('company',App\Company::find($id));
}));

Route::post('/companylist/edit/{id}', 'CompanyController@edit');



Route::post('/companylist/upload', [
    'as' => 'image.add',
    'uses' => 'CompanyController@uploadImage'
]);
