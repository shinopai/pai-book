<header class="text-gray-600 body-font border-b-2">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a href="{{ url('/') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0 text-2xl">
            <span class="material-icons" style="vertical-align: -3px;">
                book
            </span>
            パイ図書館
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <!-- component -->
            <div class='flex items-center justify-center from-cyan-100 via-pink-200 to-yellow-200 bg-gradient-to-br'>
                <form action="{{ route('books.search') }}" method="GET">
                    <div class="flex items-center max-w-md mx-auto bg-white rounded-lg " x-data="{ search: '' }">
                        <div class="w-full">
                            <input type="search" name="word" class="w-full px-4 py-1 text-gray-800 focus:outline-none border" placeholder="書籍検索(タイトル)" x-model="search">
                        </div>
                        <div>
                            <button type="submit" class="flex items-center bg-gray-500 justify-center w-12 h-8 text-white rounded-r-lg" :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'" :disabled="search.length == 0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- component -->
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
            <div class="flex justify-center items-center ml-5">
                <div x-data="{ open: false }" class="flex justify-center items-center px-5">
                    <div @click="open = !open" class="relative border-b-4 border-transparent" :class="{'border-indigo-700 transform transition duration-300 ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">
                        <div class="flex justify-center items-center space-x-3 cursor-pointer">
                            <div class="overflow-hidden">
                                <span class="material-icons" style="vertical-align: -7px;">
                                    account_circle
                                </span>
                            </div>
                            <div class="font-semibold dark:text-white text-gray-900 text-lg">
                                <div class="cursor-pointer">{{ Auth::user()->name }}</div>
                            </div>
                        </div>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-60 px-5 py-3 dark:bg-gray-800 bg-white shadow border dark:border-transparent mt-6 right-1">
                            <ul class="space-y-3 dark:text-white">
                                <li class="font-medium">
                                    <a href="#" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                                        <div class="mr-3">
                                            <span class="material-icons" style="vertical-align: -5px;">
                                                edit
                                            </span>
                                        </div>
                                        アカウント編集
                                    </a>
                                </li>
                                @if(Auth::user()->admin == 1)
                                <li class="font-medium">
                                    <a href="{{ route('admins.form') }}" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                                        <div class="mr-3">
                                            <span class="material-icons" style="vertical-align: -5px;">
                                                add
                                            </span>
                                        </div>
                                        書籍登録
                                    </a>
                                </li>
                                @endif
                                <hr class="dark:border-gray-700">
                                <li class="font-medium">
                                    <a href="#" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <div class="mr-3">
                                            <span class="material-icons" style="vertical-align: -5px;">
                                                logout
                                            </span>
                                        </div>
                                        ログアウト
                                    </a>
                                    <form action="{{ route('logout') }}" method="post" id="logout-form">
                                        @csrf</form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
