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
//     return view('index');
// });
// Route::get('/cn', function () {
//     return view('index');
// });
Route::get('/','HomeController@index');
Route::get('/about', 'HomeController@about');
// Route::get('admin', function () {
//     return view('admin.index');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth','namespace'=>'Admin','prefix'=>'admin'],function(){
	Route::get('/','AdminController@home');
	Route::resource('company','CompanyController');
	Route::resource('category','CategoryController');
	Route::get('/category/{id}/add','CategoryController@add');
	Route::resource('products','ProductController');
	Route::get('products-list/{id}', 'ProductController@products_list');//产品列表

	Route::get('image-upload', 'ProductController@imageUpload');//测试显示上传
	Route::post('image-upload-post', 'ProductController@imageUploadPost');//多图上传
	Route::get('upload-multi-form', 'ProductController@upload_multi_form');//弹出显示上传多张窗口
	Route::get('upload-one-form', 'ProductController@upload_one_form');//弹出显示上传单张窗口
	Route::post('image-one-upload-post', 'ProductController@OneImageUpload');//单图上传
	Route::get('upload-pdf-form', 'ProductController@upload_pdf_form');//弹出显示上传pdf窗口
	Route::post('pdf-one-upload-post', 'ProductController@OnePdfUpload');//上传pdf
	Route::resource('projects','ProjectsController');
	Route::resource('support','SupportController');
	Route::resource('contact','AdminContactController');
	Route::resource('newsletter','AdminNewsletterController');
	Route::resource('user','AdminController');

});
Route::get('/products/{slug}','HomeController@show');
Route::get('/products','HomeController@ShowAllProducts');
Route::get('/products-list/{slug}','TypesController@index');
Route::get('/project/{id}','HomeController@ShowProject');
Route::get('/projects','HomeController@ShowAllProjects');
Route::get('/support/{id}','HomeController@ShowSupport');
Route::get('/support','HomeController@ShowSupports');
Route::resource('contact','ContactController');
Route::get('/contact-ok','ContactController@contactok');
// Route::resource('newsletter','NewsletterController');
Route::post('newsletter-post','NewsletterController@store');
Route::get('/newsletter-ok','NewsletterController@newsletterok');