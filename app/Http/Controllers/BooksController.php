<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\Like;

class BooksController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        if($request->has('category')){
            $category = $request->input('category');
            $category_name = Category::where('id', $category)->first()->name;

            $books = Book::where('category_id', $category)->paginate('10');
            $books->load('category');
            $categories = Category::all();
            $categories->load('books');

            $top_three = Like::selectRaw('count(id) as count, book_id')->orderBy('count', 'desc')->groupBy('book_id')->limit(3)->get();
            $top_three->load('book');

            return view('books.index')->with(
                [
                'books' => $books,
                'categories' => $categories,
                'category_name' => $category_name,
                'top_three' => $top_three
            ]
        );
        }else{
            $books = Book::latest()->limit(8)->get();
            $books->load('category');
            $categories = Category::all();
            $categories->load('books');

            $top_three = Like::selectRaw('count(id) as count, book_id')->orderBy('count', 'desc')->groupBy('book_id')->limit(3)->get();
            $top_three->load('book');

            return view('books.index')->with(
                [
                'books' => $books,
                'categories' => $categories,
                'top_three' => $top_three
            ]
        );
        }
    }

    public function show(Book $book){
        $book->load('category');

        return view('books.show')->with('book', $book);
    }

    public function showAll(){
        $books = Book::latest()->paginate(10);
        $books->load('category');
        $categories = Category::all();
        $categories->load('books');

        return view('books.all')->with(
            [
                'books' => $books,
                'categories' => $categories
            ]
        );
    }

    public function search(Request $request){
        $books = Book::where('title', 'like', '%'.$request->input('word').'%')->paginate(10);
        $books->load('category');
        $categories = Category::all();
        $categories->load('books');

        return view('books.search')->with(
            [
                'books' => $books,
                'categories' => $categories
            ]
        );
    }
}
