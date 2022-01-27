<?php

use Illuminate\Http\Request;

// get current user
Route::get('/user', function (Request $request) {
    return $request->user()->id;
});

// likes
  // get book's like number
  Route::get('/books/{book}/likes', 'Api\LikesController@getLikeNumber');

  // like book
  Route::post('/users/{user}/books/{book}/like', 'Api\LikesController@likeBook');

  // unlike book
  Route::delete('/users/{user}/books/{book}/unlike', 'Api\LikesController@unlikeBook');

  // check if user likes this book
  Route::get('/users/{user}/books/{book}/check', 'Api\LikesController@checkIsLike');

// comments
Route::resource('users.books.comments', Api\CommentsController::class, ['only' => ['store', 'destroy']]);

  // get all comments per book
  Route::get('/books/{book}/comments', 'Api\CommentsController@getAll');
