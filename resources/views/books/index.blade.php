@extends('layouts.app')

@section('content')

@include('layouts/partial/header')

@if (session('flash'))
<p class="bg-green-300 text-white p-2 text-center">{{ session('flash') }}</p>
@endif

<div class="flex justify-center">
    <!-- sidemenu -->
    @include('layouts.partial.sidemenu')
    <!-- /sidemenu -->

    <!-- main -->
    <div class="container mx-auto flex-grow my-8 justify-center p-10">
        <h1 class="mb-10 text-center text-xl font-bold">
            @if(isset($category_name))
            {{ $category_name }}({{ $books->count() }}件)
            @else
            新着書籍
            @endif
        </h1>
        <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-5">
            @foreach($books as $book)
            <a href="{{ route('books.show', ['book' => $book->id]) }}">
                <div class="overflow-hidden cursor-pointer text-center">
                    <img src="{{ $book->image_path }}" class="mx-auto">
                    <div class="flex items-center justify-center pt-3">
                        <h1 class="font-bold">{{ $book->title }}</h1>
                        <i class="fa fa-heart-o"></i>
                    </div>
                    <p class=" text-base">
                        {{ $book->author }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
        <h1 class="mb-10 mt-36 text-center text-xl font-bold"><span class="material-icons text-red-500" style="vertical-align: -5px;">
                favorite
            </span>TOP3</h1>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-5">
            @foreach($top_three as $book)
            <a href="{{ route('books.show', ['book' => $book->book->id]) }}">
                <div class="overflow-hidden cursor-pointer text-center">
                    <img src="{{ $book->book->image_path }}" class="mx-auto">
                    <div class="flex items-center justify-center pt-3">
                        <h1 class="font-bold">{{ $book->book->title }}</h1>
                        <i class="fa fa-heart-o"></i>
                    </div>
                    <p class=" text-base">
                        {{ $book->book->author }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <!-- /main -->
</div>

<script src="{{ asset('js/index.js') }}"></script>
@endsection
