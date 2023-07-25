<x-guest-layout>
    <div class="relative flex flex-col items-center bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="p-5">
            <a href="{{ route('posts.index') }}" class="text-3xl font-semibold text-gray-400 hover:text-gray-600 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-none">
                全ての投稿を見る>>
            </a>
        </div>
        <div class="p-3">
            <a href="{{ route('posts.index', ['category_id'=> 2]) }}" class="text-3xl px-4 font-semibold text-green-300 hover:text-green-500 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-none">
                原作を探す
            </a>
            <a href="{{ route('posts.index', ['category_id'=> 1]) }}" class="text-3xl px-4 font-semibold text-blue-300 hover:text-blue-500 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-none">
                作画を探す
            </a>
        </div>
        
    </div>
    <x-slot name="auth">
    @if (Route::has('login'))
        <!-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">表示位置 -->
        <div class="p-3">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-xl p-3 border-2  border-gray-300 font-semibold text-gray-400 bg-white rounded-md hover:text-gray-600 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-none">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-xl py-1 px-4 border-2 border-gray-300 font-semibold text-gray-400 bg-white rounded-md hover:text-gray-600 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-none">ログイン</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-xl py-1 px-4 ml-4 border-2 border-gray-300 font-semibold text-gray-400 bg-white rounded-md hover:text-gray-600 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-none">新規登録</a>
            @endif
            @endauth
        </div>
    @endif
    </x-slot>
</x-guest-layout>