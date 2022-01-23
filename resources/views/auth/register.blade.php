@extends('layouts.app')

@section('content')
<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-12 mx-auto">
        <div class="flex flex-col text-center w-full mb-6">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">利用登録</h1>
            <hr>
        </div>
        <div class="mb-3">
            <div class="">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="p-2 w-2/3 mx-auto">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">名前</label>
                            <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('name')
                            <span class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="p-2 w-2/3 mx-auto">
                        <div class="relative">
                            <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                            <input type="text" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('email')
                            <span class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="p-2 w-2/3 mx-auto">
                        <div class="relative">
                            <label for="password" class="leading-7 text-sm text-gray-600">パスワード</label>
                            <input type="password" id="password" name="password" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('password')
                            <span class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="p-2 w-2/3 mx-auto">
                        <div class="relative">
                            <label for="password-confirmation" class="leading-7 text-sm text-gray-600">パスワード(確認)</label>
                            <input type="password" id="password-confirmation" name="password_confirmation" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <button type="submit" class="flex mx-auto text-white bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-lg">登録</button>
                    </div>
                </form>
            </div>
        </div>
        <a class="btn btn-link block w-36 mx-auto text-center hover:text-blue-500 hover:underline" href="{{ route('login') }}">
            既に登録済みの方
        </a>
    </div>
</section>
@endsection
