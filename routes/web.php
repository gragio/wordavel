<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/testme', function () { var_dump(get_posts()); });

Route::get('/blog/{slug?}', 'PageController@blog');

Route::get('/{page?}', 'PageController@page');
