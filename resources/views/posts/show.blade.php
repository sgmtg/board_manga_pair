<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Board') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                <div class="p-0 text-gray-900">
                    <div class="card">
                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <h6 class="card-title">投稿者：{{$post->user->name}}</h6>
                            <h6 class="card-title">カテゴリー：{{$post->category->category_name}}</h6>
                            <p class="card-text">{{$post->content}}></p>
                        </div>
                    </div>
                </div>

                <div class = "p-6">
                    <div class="card">
                  
                        <div class="card-body">
                            <!-- <h5 class="card-title">{{$post->title}}</h5>
                            <h6 class="card-title">投稿者：{{$post->user->name}}</h6>
                            <h6 class="card-title">カテゴリー：{{$post->category->category_name}}</h6> -->
                            <p class="card-text">{{$post->content}}></p>
                        </div>
                    </div>
                    <a href="{{ route('comments.create',['post_id'=> $post->id]) }}" class="btn btn-primary">コメントをする</a>

                </div>

                
            </div>
        <!-- </div> -->
    </div>
</x-app-layout>
