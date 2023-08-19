<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>

    <div class="card-body">
        @if(session('status'))
        <p class="text_danger" style="color:red;">
            {{session('status')}}
        </p>
        @endif
    </div>

    <div class="py-2">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @include('posts.post-show')
            <div class="p-6">
                <a href="{{ route('comments.create',['post_id'=> $post->id]) }}" class="btn btn-primary" style="background-color:rgba(0,0,0,0.5); font-weight: bold; border:none;">この投稿にコメントをする</a>
            </div>
        </div>
            <div class="p-6">
                @if(count($post->comments) > 0)

                <h4 class="font-semibold pt-2">コメント一覧</h4>
                全{{count($post->comments)}}件

                @foreach($post->comments as $comment)
                <div class="card border-dark">
                    <div class="card-header flex flex-col sm:flex-row sm:items-center justify-between font-semibold">
                        <div>
                            <span class="">[#{{ $loop->iteration }}]</span>
                            @if($comment->user)
                            <a href="{{route('users.show', $comment->user_id)}}" class="font-semibold">
                                {{$comment->user->name}}
                            </a>
                            @else
                            <span class="font-semibold">non-user</span>
                            @endif
                            <span class="text-gray-400">さんからのコメント</span>
                        </div>
                        <div class="text-right text-gray-400">{{$comment->updated_at}}</div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {!!  nl2br(e($comment->comment)) !!}
                        </p>
                    </div>
                </div>
                <br>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</x-app-layout>