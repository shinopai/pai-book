<?php
// root
Route::get('/', 'BooksController@index')->name('books.index');

// auth user
Auth::routes();

// users
Route::get('/users/all', 'UsersController@showAll')->name('users.all');

// admin
Route::prefix('admin')->group(function () {
  Route::get('/form','AdminsController@showForm')->name('admins.form');
  Route::get('/access/api','AdminsController@accessToApi')->name('admins.accessToApi');
  Route::get('/confirm/form', function(){
    return view('admins.confirm_form');
  });
  Route::post('/books', 'AdminsController@addBook')->name('admins.addBook');
});

// books
Route::get('/books/all', 'BooksController@showAll')->name('books.all');
Route::get('/search', 'BooksController@search')->name('books.search');
Route::resource('books', BooksController::class);
