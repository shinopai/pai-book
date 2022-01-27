<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Like;
use App\Category;

class UsersController extends Controller
{
    public function showAll(){
        $users = User::latest()->paginate(20);
        $users->load('likes');
        $categories = Category::all();
        $categories->load('books');

        return view('users.all')->with(
            [
              'users' => $users,
              'categories' => $categories
            ]
        );
    }
}
