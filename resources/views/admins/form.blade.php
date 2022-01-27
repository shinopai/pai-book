<div class=" bg-gray-200">
    <div class="container h-screen flex justify-center items-center">
        <form action="{{ route('admins.accessToApi') }}" method="GET">
            @csrf
            <div class="relative">
                <div class="absolute top-4 left-3"> <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i> </div> <input type="text" name="isbn" class="h-14 w-96 pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="ISBN">
                <div class="absolute top-2 right-2"> <button type="submit" class="h-10 w-24 text-white rounded-lg bg-indigo-500 hover:bg-indigo-600">情報を取得</button> </div>
            </div>
        </form>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
