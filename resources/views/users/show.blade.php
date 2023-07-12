<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$user->name}}さんの投稿
        </h2>
    </x-slot>
    

    <div class="py-12">
        @if(session('err_msg'))
        <p class="text_danger" style="color: blue;">
            {{session('err_msg')}}
        </p>
        @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                @foreach($user->posts as $post)
                @include('posts.post-content')
                @endforeach
                    
                
            </div>
    </div>
</x-app-layout>
