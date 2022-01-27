<div class="h-screen w-48 px-4 pt-10 border-r bg-white">
    <div class="h-3/4 flex flex-col text-gray-500">
        @foreach($categories as $category)
        <h3 class="pl-1 text-sm flex items-center py-2 mb-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in @if(request()->input('category') == $category->id) border-l-2 border-indigo-400 @endif">
            <a class="hover:text-black transition duration-200 ease-linear" href="{{ route('books.index', ['category' => $category->id]) }}">{{ $category->name }}({{ count($category->books) }})</a>
        </h3>
        @endforeach
        <hr>
        <h3 class="pl-1 text-sm flex items-center py-2 mb-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in mt-5">
            <a class="hover:text-black transition duration-200 ease-linear" href="{{ route('books.all') }}">書籍一覧</a>
        </h3>
        <h3 class="pl-1 text-sm flex items-center py-2 mb-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in">
            <a class="hover:text-black transition duration-200 ease-linear" href="{{ route('users.all') }}">ユーザー一覧</a>
        </h3>
    </div>
</div>
