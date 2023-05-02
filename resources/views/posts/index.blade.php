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

                    @if($post->category_id == 1)
                        <div class="card" style="background-color: rgba(255, 0, 0, 0.1);">
                    @elseif($post->category_id == 2)
                        <div class="card" style="background-color: rgba(0, 0, 255, 0.1);">
                    @else
                        <div class="card" style="background-color: rgba(0, 255, 0, 0.1);">
                    @endif

                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <h6 class="card-title">投稿者：{{$post->user->name}}</h6>
                            <h6 class="card-title">
                                カテゴリー：
                                <a href="{{route('posts.index', ['category_id'=> $post->category_id])}}">
                                    {{$post->category->category_name}}
                                </a>
                            </h6>
                            <p class="card-text">{{$post->content}}></p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary" style="background-color:rgba(0,0,0,0.5); font-weight: bold; border:none;">詳細</a>
                            <p>
                            <h6 class="card-title">投稿日時：{{$post->updated_at}}</h6>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                    
                
            </div>
        <!-- </div> -->
    </div>
</x-app-layout>
