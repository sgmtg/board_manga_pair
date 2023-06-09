<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
            @include('posts.post-content')


                <div class = "p-6">
                    <!-- <div class="card">
    
                        <div class="card-body"> -->
                            <!-- <h5 class="card-title">{{$post->title}}</h5>
                            <h6 class="card-title">投稿者：{{$post->user->name}}</h6>
                            <h6 class="card-title">カテゴリー：{{$post->category->category_name}}</h6> -->
                            <!-- <p class="card-text">{{$post->content}}></p> -->
                        <!-- </div>
                    </div> -->
                    <a href="{{ route('comments.create',['post_id'=> $post->id]) }}" class="btn btn-primary" style="background-color:rgba(0,0,0,0.5); font-weight: bold; border:none;">コメントをする</a>

                </div>
                <div class = "p-6">
                    <h4>コメント一覧</h4>
                    @foreach($post->comments as $comment)
                    <div class = "card">
                    <div class="card-body">
                        <h6 class="card-title">投稿者：
                            <a href = "{{route('users.show', $post->user_id)}}">
                                {{$comment->user->name}}
                            </a>
                        </h6>
                        <p class="card-text">{{$comment->comment}}</p>
                    </div>
                    </div>
                    <br>
                    @endforeach
                </div>
                
            </div>
        <!-- </div> -->
    </div>
</x-app-layout>
