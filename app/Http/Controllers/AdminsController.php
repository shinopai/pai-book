<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;

class AdminsController extends Controller
{
    public function showForm(){
        return view('admins.form');
    }

    public function accessToApi(Request $request){
        $base_url = 'https://www.googleapis.com/books/v1/volumes?q=isbn:';

        $url = $base_url.$request->input('isbn');

        $json = file_get_contents($url);
        $result = json_decode($json);

        $categories = Category::all();

        return view('admins.confirm_form')->with([
            'result' => $result,
            'categories' => $categories
        ]);
    }

    public function addBook(Request $request){
      Book::create([
          'title' => $request->input('title'),
          'author' => $request->input('author'),
          'published_at' => $request->input('published_at'),
          'description' => $request->input('description'),
          'image_path' => $request->input('image_path'),
          'category_id' => $request->input('category_id')
      ]);

      return redirect('/')->with('flash', '書籍の登録が完了しました');
    }
}
