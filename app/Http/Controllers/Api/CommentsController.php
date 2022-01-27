<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Book;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request, User $user, Book $book){
      $this->validate($request, [
          'body' => 'required|max:100'
      ]);

      Comment::create([
          'user_id' => $user->id,
          'book_id' => $book->id,
          'body' => $request->input('body')
      ]);
    }

    public function getAll(Book $book){
        $comments = Comment::where('book_id', $book->id)->orderBy('created_at', 'desc')->get();
        $comments->load('user');

        return $comments;
    }

    public function destroy(User $user, Book $book, Comment $comment){
        $comment->delete();
    }
}
