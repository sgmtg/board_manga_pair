<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Board') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        @if(session('err_msg'))
        <p class="text_danger" style="color: blue;">
            {{session('err_msg')}}
        </p>
        @endif
        <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    

                @foreach($posts as $post)
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <h6 class="card-title">投稿者：{{$post->user->name}}</h6>
                            <h6 class="card-title">カテゴリー：{{$post->category->category_name}}</h6>
                            <p class="card-text">{{$post->content}}></p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                </div>
                @endforeach
                    
                
            </div>
        <!-- </div> -->
    </div>
</x-app-layout>
