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

Auth::routes();  

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::group([ 'middleware' => ['auth','admin'] ], function(){

Route::get('/home', 'HospitalController@index');


Route::get('/hospital', 'HospitalController@index')->name('hospital.home');
Route::get('/hospital/create', 'HospitalController@create')->name('hospital.create');
Route::POST('/hospital/create', 'HospitalController@store')->name('hospital.store');
Route::get('/hospital/{hospital}/edit', 'HospitalController@edit')->name('hospital.edit');
Route::PUT('/hospital/{hospital}/update', 'HospitalController@update')->name('hospital.update');
Route::get('/hospital/{hospital}/show', 'HospitalController@show')->name('hospital.show');
Route::get('/hospital/{hospital}/destroy', 'HospitalController@destroy')->name('hospital.destroy');


Route::get('/department', 'DepartmentController@index')->name('department.home');
Route::get('/department/create', 'DepartmentController@create')->name('department.create');
Route::POST('/department/create', 'DepartmentController@store')->name('department.store');
Route::get('/department/{department}/edit', 'DepartmentController@edit')->name('department.edit');
Route::PUT('/department/{department}/update', 'DepartmentController@update')->name('department.update');
Route::get('/department/{department}/show', 'DepartmentController@show')->name('department.show');
Route::get('/department/{department}/destroy', 'DepartmentController@destroy')->name('department.destroy');



Route::get('/doctor', 'DoctorController@index')->name('doctor.home');
Route::get('/doctor/create', 'DoctorController@create')->name('doctor.create');
Route::POST('/doctor/create', 'DoctorController@store')->name('doctor.store');
Route::get('/doctor/{doctor}/edit', 'DoctorController@edit')->name('doctor.edit');
Route::PUT('/doctor/{doctor}/update', 'DoctorController@update')->name('doctor.update');
Route::get('/doctor/{doctor}/show', 'DoctorController@show')->name('doctor.show');
Route::get('/doctor/{doctor}/destroy', 'DoctorController@destroy')->name('doctor.destroy');


Route::get('/customer', 'CustomrController@index')->name('customer.home');
Route::get('/customer/create', 'CustomrController@create')->name('customer.create');
Route::POST('/customer/create', 'CustomrController@store')->name('customer.store');
Route::get('/customer/{customr}/edit', 'CustomrController@edit')->name('customer.edit');
Route::PUT('/customer/{customr}/update', 'CustomrController@update')->name('customer.update');
Route::get('/customer/{customr}/show', 'CustomrController@show')->name('customer.show');
Route::get('/customer/{customr}/destroy', 'CustomrController@destroy')->name('customer.destroy');


Route::get('/new', 'BlogController@index')->name('new.home'); 
Route::get('/new/create', 'BlogController@create')->name('new.create');
Route::POST('/new/create', 'BlogController@store')->name('new.store');
Route::get('/new/{blog}/edit', 'BlogController@edit')->name('new.edit');
Route::PUT('/new/{blog}/update', 'BlogController@update')->name('new.update');
Route::get('/new/{blog}/show', 'BlogController@show')->name('new.show');
Route::get('/new/{blog}/destroy', 'BlogController@destroy')->name('new.destroy');


Route::get('/price', 'PriceController@index')->name('price.home'); 
Route::get('/price/create', 'PriceController@create')->name('price.create');
Route::POST('/price/create', 'PriceController@store')->name('price.store');
Route::get('/price/{price}/edit', 'PriceController@edit')->name('price.edit');
Route::PUT('/price/{price}/update', 'PriceController@update')->name('price.update');
Route::get('/price/{price}/destroy', 'PriceController@destroy')->name('price.destroy');
});

Route::get('/',  'forHospitalController@home')->name('forent.hospital.home');


// forntEnd 

Route::get('/forentend/home', 'forHospitalController@home')->name('forent.hospital.home');
Route::get('/forentend/hospital', 'forHospitalController@index')->name('forent.about.home');
Route::get('/forentend/doctor', 'forDoctorController@index')->name('forent.doctor.home');
Route::get('/forentend/department', 'forDepartmentController@index')->name('forent.department.home');
Route::get('/forentend/blog', 'forBlogController@index')->name('forent.blog.home');
Route::get('/forentend/{new}/show', 'forBlogController@show')->name('forent.blog.show');
Route::POST('/comment/store', 'CommentController@store')->name('comment.store');
Route::get('/contacu/home', 'ContactController@index')->name('forent.contacu.home');
Route::POST('/contacu/store', 'ContactController@store')->name('contacu.store');
Route::get('/makeApoint/create', 'forHospitalController@makePoint')->name('makePoint.create');
Route::POST('/makeApoint/create', 'forHospitalController@store')->name('makePoint.store');
Route::get('/forentend/price', 'forPriceController@index')->name('forent.price.home');








