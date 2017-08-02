<?php

Route::get('/', 'MainPage@index');
Route::post('/post/save', 'MainPage@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts.id', 'PostController');

Route::get('/apie_autentifikacija', function () {
    return view("layouts.auth_info");
});

//Route::get('/mano_profilis', function(){
//    return view("layouts.user_profile");
//});

Route::group(['middleware' => 'auth'], function () {
    Route::get('rodyti_mano_profili', 'UserController@showMyProfile')->name('showMyProfile');
    Route::post('redaguoti_profili', 'UserController@editMyProfile')->name('editMyProfile');
    Route::get('gauti_duomenis/{id}', 'UserController@getUserData')->name('getUserData');

    Route::resource('vartotojo_profilis', 'UserController', ['middleware' => 'auth.canedit', 'names' => [
        'show' => 'user:profile'
    ]]);

    Route::get('vartotojai', 'AllUsersController@show');
});

Route::post('komentaras', 'UserController@postComment')->name('postComment');
