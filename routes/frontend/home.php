<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'HomeController@index')->name('index');
Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/send', 'ContactController@send')->name('contact.send');
Route::get('/show/{slug}', 'HomeController@show')->name('show');
Route::get('/filter/{tag}', 'HomeController@filterTag')->name('filter');


/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {

        /*
        * User Testing Specific
        */
        Route::get('testing', 'TestingController@index')->name('index');
        /*
        * User auth post comment
        */
        Route::post('show/{slug}', 'CommentController@store');
        /*
        * User auth edit comment
        */
         Route::get('show/{id}/edit', 'CommentController@edit');
        //  Route::get('show/{slug}/{id}', 'CommentController@edit');
        /*
        * User auth update comment
        */
       Route::put('show/{id}/edit', 'CommentController@update');
       /*
        * User delete Comment
        */
        Route::delete('show/{id}', 'CommentController@destroy');

        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
    });
});
