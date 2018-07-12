<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('item', 'ItemController@index')->name('item');
Route::get('item/edit/{id}', 'ItemController@editItem')->name('item.edit');
Route::post('item/edit/{id}', 'ItemController@updateItem')->name('item.edit');

//route for quote
Route::get('quotes', 'QuoteController@index')->name('quotes');
Route::get('quotes/create', 'QuoteController@create')->name('quotes.create');
Route::post('quotes/create', 'QuoteController@store')->name('quotes.create');
Route::get('quotes/show/{title}', 'QuoteController@show')->name('quotes.show');
Route::get('quotes/edit/{title}', 'QuoteController@edit')->name('quotes.edit');
Route::post('quotes/edit/{id}', 'QuoteController@update')->name('quotes.update');
Route::delete('quotes/{id}', 'QuoteController@destroy')->name('quotes.delete');

//route for quote Image
Route::get('quotes/editImage/{title}', 'PhotoController@editImage')->name('quotes.editImage');

//route for tags
Route::get('tags', 'TagController@index')->name('tags');
Route::get('tags/create', 'TagController@create')->name('tags.create');
Route::post('tags/create', 'TagController@store')->name('tags.create');
Route::get('tags/edit/{id}', 'TagController@edit')->name('tags.edit');
Route::post('tags/edit/{id}', 'TagController@update')->name('tags.update');
