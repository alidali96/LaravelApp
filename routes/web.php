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

Route::get('/', 'HomeController@index')->name('home.index');

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/contact', function () {
//    return "Ali Dali";
//});

Route::get('/fun', function () {
    return "Laravel makes it easy to develop websites!";
})->name('fun.index');

Route::get('/uid/{id}', function ($id) {
    return "ID: $id";
})->where('id', '[0-9]+');

//Route::get('/users/{name?}', function ($name = "batman")  {
//    return "Name: $name";
//})->where('name', '[A-Z a-z]+')->name('users.show');
//
//Route::get('/users/{name?}/images/{image?}', function ($name = "batman", $image = 0)  {
//    return "Name: $name\nImage: $image";
//})->where(['name' => '[A-Z a-z]+', 'image' => '[0-9]+'])->name('users.images.show');

Route::group(['as' => 'users.',
    'prefix' => 'users',
    'where' => ['name' => '[A-Z a-z]+', 'image' => '[0-9]+']],
    function () {

    Route::get('{name?}', function ($name = "Batman") {
        return "Name: $name";
    })->name('show');

    Route::get('{name}/images/{image}', function ($name, $image) {
        return "Name: $name<br>Image: $image";
    })->name('images.show');

});


Route::get('/aboutme', function() {
    $name =  ["fullName" => "Ali Dali"];
   return view('pages.about',$name);
})->name('about.show');

Route::get('/thingsiknow', function() {
    $items = ['Java', 'C#', 'PHP', 'Swift'];
    return view('pages.langs', compact('items'));
})->name('langs.show');

Route::get('/contact', function() {
//    return view('pages.contact');
    return view('pages.contact')->with('email', 'ali.dali01@stclairconnect.ca');
})->name('contact.show');

Route::get('/articles', 'ArticleController@index')->name('articles.index');
Route::get('/articles/create', 'ArticleController@create')->name('articles.create');
Route::get('/articles/{article}', 'ArticleController@show')->name('articles.show');
