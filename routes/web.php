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

     Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
        Route::resource('category', 'CategoryController');
         Route::post('/deleteSelectedCategory',[CategoryController::class,'deleteSelectedCategory'])->name('delete.selected.Category');
         Route::put('category/{id}/status', 'CategoryController@status');

          Route::resource('brand', 'BrandController');
         Route::put('brand/{id}/status', 'BrandController@status');
            Route::post('/deleteSelectedBrand',[BrandController::class,'deleteSelectedBrand'])->name('delete.selected.Brand');

             Route::resource('product', 'ProductController');
         Route::get('product/view/{id}', 'ProductController@view');

         Route::put('product/{id}/status', 'ProductController@status');
            Route::post('/deleteSelectedProduct',[ProductController::class,'deleteSelectedProduct'])->name('delete.selected.Product');

             Route::post('/updatepassword', 'HomeController@update_password')->name('update.password');
       Route::put('/profile/update', 'HomeController@profile_update')->name('profile.update');
       Route::get('/profile', 'HomeController@profile');

             



        });



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'MainController@index');
Route::get('/shop', 'MainController@shop');
Route::get('/product_detail/{slug}', 'MainController@product_detail');

Route::get('/blog', 'MainController@blog');
Route::get('/contact', 'MainController@contact');
Route::get('/product', 'MainController@product');



