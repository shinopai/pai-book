<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Like;
use App\Book;
use App\User;

class LikesController extends Controller
{
    public function getLikeNumber(Book $book){
      $likes = Like::where('book_id', $book->id)->count();

      return $likes;
    }

    public function likeBook(User $user, Book $book){
        Like::create([
            'user_id' => $user->id,
            'book_id' => $book->id
        ]);
    }

    public function unlikeBook(User $user, Book $book){
        $like = Like::where('user_id', $user->id)->where('book_id', $book->id)->first();
        $like->delete();
    }

    public function checkIsLike(User $user, Book $book){
        $like = Like::where('user_id', $user->id)->where('book_id', $book->id)->get();

        return $like;
    }
}
