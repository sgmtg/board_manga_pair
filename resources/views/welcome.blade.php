<x-guest-layout>
    <div class="relative flex flex-col items-center bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="p-5">
            <a href="{{ route('posts.index') }}" class="text-3xl font-semibold text-gray-400 hover:text-gray-600 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                掲示版を見る>>
            </a>
        </div>
        @if (Route::has('login'))
        <!-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">表示位置 -->
        <div class="p-3">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-3xl p-12 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-3xl px-4 font-semibold text-green-300 hover:text-green-500 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-3xl px-4 ml-4 font-semibold text-blue-300 hover:text-blue-500 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
            @endauth
        </div>
        @endif
        @if(session('err_msg'))
        <p class="text_danger">
            {{session('err_msg')}}
        </p>
        @endif
    </div>
</x-guest-layout>