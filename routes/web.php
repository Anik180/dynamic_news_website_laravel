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
    return view('fronend.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/logout', 'HomeController@logout')->name('admin.logout');


//category
Route::get('/category', 'backend\CategoryController@index')->name('category');
Route::post('/store/category', 'backend\CategoryController@store')->name('store.category');
Route::get('/delete/category/{id}', 'backend\CategoryController@delete')->name('delete.category');
Route::get('/edit/category/{id}', 'backend\CategoryController@edit')->name('edit.category');
Route::post('/update/category/{id}', 'backend\CategoryController@update')->name('update.category');

//subcategory
Route::get('/sub/category', 'backend\SubcategoriesController@index')->name('subcategory');
Route::post('/store/subcategory', 'backend\SubcategoriesController@store')->name('store.subcategory');
Route::get('/delete/subcategory/{id}', 'backend\SubcategoriesController@delete')->name('delete.subcategory');
Route::get('/edit/subcategory/{id}', 'backend\SubcategoriesController@edit')->name('edit.subcategory');
Route::post('/update/subcategory/{id}', 'backend\SubcategoriesController@update')->name('update.subcategory');
// division
Route::get('/division', 'backend\DivisionController@index')->name('division');
Route::post('/store/division', 'backend\DivisionController@store')->name('store.division');
Route::get('/delete/division/{id}', 'backend\DivisionController@delete')->name('delete.division');
Route::get('/edit/division/{id}', 'backend\DivisionController@edit')->name('edit.division');
Route::post('/update/division/{id}', 'backend\DivisionController@update')->name('update.division');
//district
Route::get('/district', 'backend\DistrictController@index')->name('district');
Route::post('/store/district', 'backend\DistrictController@store')->name('store.district');
Route::get('/delete/district/{id}', 'backend\DistrictController@delete')->name('delete.district');
Route::get('/edit/district/{id}', 'backend\DistrictController@edit')->name('edit.district');
Route::post('/update/district/{id}', 'backend\DistrictController@update')->name('update.district');

Route::get('/get/subcategory/{category_id}', 'backend\PostController@getsubcategory');
Route::get('/get/district/{division_id}', 'backend\PostController@getdistrict');
Route::get('/get/district/front/{division_id}','frontend\ExtraController@getdistrict');
// post

Route::get('/add/post', 'backend\PostController@create')->name('add.post');
Route::post('/store/post', 'backend\PostController@storepost')->name('store.post');
Route::get('/all/post', 'backend\PostController@index')->name('all.post');
Route::get('/delete/post/{id}', 'backend\PostController@deletepost')->name('delete.post');
Route::get('/edit/post/{id}', 'backend\PostController@editpost')->name('edit.post');
Route::post('/update/post/{id}', 'backend\PostController@updatepost')->name('update.post');
//contact
Route::get('/contact', 'backend\ContactController@index')->name('contact');
Route::post('/update/contact/{id}', 'backend\ContactController@updatecontact')->name('update.contact');
//logo
Route::get('/logo', 'backend\ContactController@logo')->name('logo');
Route::post('/update/logo/{id}', 'backend\ContactController@updatelogo')->name('update.logo');
//social
Route::get('/social', 'backend\ContactController@socialsetting')->name('social');
Route::post('/update/social/{id}', 'backend\ContactController@updatesocial')->name('update.social');

//ads
Route::get('/vertical/ads', 'backend\AdsController@verticalads')->name('vertical.ads');
 Route::post('/store/vertical', 'backend\AdsController@storevertical')->name('store.vertical');
Route::get('/delete/vertical/{id}', 'backend\AdsController@deletevertical')->name('delete.vertical');
Route::get('/edit/vertical/{id}', 'backend\AdsController@editvertical')->name('edit.vertical');
Route::post('/update/vertical/{id}', 'backend\AdsController@updatevertical')->name('update.vertical');

// allpost
Route::get('post/{id}/{category_bn}','frontend\ExtraController@allpostcat');
Route::get('posts/{id}/{category_bn}','frontend\ExtraController@allpost');
//singlepost
Route::get('view-post/{id}/{slug}','frontend\ExtraController@singlepost');
//search
Route::get('/search/news', 'frontend\ExtraController@search')->name('search.news');
Route::get('/all/news','frontend\ExtraController@allnews')->name('all.news');
//video
Route::get('/video', 'backend\ExtraController@videoindex')->name('video');
 Route::post('/store/video', 'backend\ExtraController@storevideo')->name('store.video');
Route::get('/delete/video/{id}', 'backend\ExtraController@deletevideo')->name('delete.video');
Route::get('/edit/video/{id}', 'backend\ExtraController@editvideo')->name('edit.video');
Route::post('/update/video/{id}', 'backend\ExtraController@updatevideo')->name('update.video');