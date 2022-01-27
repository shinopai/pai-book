@extends('layouts.app')

@section('content')

@include('layouts/partial/header')

<div class="flex justify-center">
    <!-- sidemenu -->
    @include('layouts.partial.sidemenu')
    <!-- /sidemenu -->

    <!-- main -->
    <div class="container mx-auto flex-grow my-8 justify-center p-10">
        {{ Breadcrumbs::render('search') }}

        <h1 class="mb-10 text-center text-xl font-bold">検索結果({{ $books->count() }}件:&nbsp;{{ request()->input('word') }})</h1>
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
        {{ $books->appends(request()->input())->links('vendor.pagination.default') }}
    </div>
    <!-- /main -->
</div>

<script src="{{ asset('js/index.js') }}"></script>
@endsection
