@extends('layouts.app')

@section('content')

@include('layouts.partial.header')

{{ Breadcrumbs::render('show', $book) }}

<section class="text-gray-600 body-font">
    <div class="container px-5 py-12 mx-auto flex flex-wrap">
        <div class="lg:w-1/2 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
            <img alt="{{ $book->title }}" class="object-cover object-center w-1/2 mx-auto" src="{{ $book->image_path }}">
        </div>
        <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12 lg:text-left text-center mt-20">
            <div class="flex flex-col mb-10 lg:items-start items-center">
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{ $book->title }}</h2>
                    <table class="table-fixed">
                        <tbody>
                            <tr>
                                <th>著者</th>
                                <td class="pl-5">{{ $book->author }}</td>
                            </tr>
                            <tr>
                                <th>出版日</th>
                                <td class="pl-5">{{ $book->published_at }}</td>
                            </tr>
                            <tr>
                                <th>カテゴリー</th>
                                <td class="pl-5">{{ $book->category->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="btn-app"></div>
        </div>
    </div>
    <p class="text-left w-2/3 mx-auto leading-8
    ">{{ $book->description }}</p>
    <div id="comment-app"></div>
</section>

<script src="{{ asset('js/index.js') }}"></script>
@endsection
