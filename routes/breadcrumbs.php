<?php
// home
Breadcrumbs::for('home', function ($trail) {
  $trail->push('Home', url('/'));
});

// book detail
Breadcrumbs::for('show', function ($trail, $book) {
  $trail->parent('home');
  $trail->push($book->title, route('books.show', ['book' => $book->id]));
});

// all books
Breadcrumbs::for('allbooks', function ($trail) {
  $trail->parent('home');
  $trail->push('書籍一覧', route('books.all'));
});

// all users
Breadcrumbs::for('allusers', function ($trail) {
  $trail->parent('home');
  $trail->push('ユーザー一覧', route('users.all'));
});

// search result page
Breadcrumbs::for('search', function ($trail) {
  $trail->parent('home');
  $trail->push('検索結果', route('books.search'));
});
