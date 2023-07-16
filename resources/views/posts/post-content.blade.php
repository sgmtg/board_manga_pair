<div class="p-6 text-gray-900">

    @if($post->category_id == 1)
    <div class="card" style="background-color: rgba(0, 0, 255, 0.1);">
    @elseif($post->category_id == 2)
    <div class="card" style="background-color: rgba(0, 255, 0, 0.1);">
    @else
    <div class="card" style="background-color: rgba(255, 0, 0, 0.1);">
        @endif

        <div class="card-header">
            投稿 No.{{$post->id}}
        </div>
        <div class="card-body">
            <h5 class="card-title" style="font-weight: bold">{{$post->title}}</h5>
            <div class="">
                <span class="card-title pr-5 text-lg">
                    投稿者：
                    @if($post->user)
                    <a href="{{route('users.show', $post->user_id)}}" class="font-semibold">
                        {{$post->user->name}}
                    </a>
                    @else
                        <span class="font-semibold">non-user</span>
                    @endif
                </span>
                <span class="card-title text-base">
                    カテゴリー：
                    <a href="{{route('posts.index', ['category_id'=> $post->category_id])}}" class="font-semibold">
                        {{$post->category->category_name}}
                    </a>
                </span>
            </div>
            <div class="card" style="background-color: rgba(255, 0, 0, 0);">
                <div class="card-body">
                    <p class="card-text">{{$post->content}}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary" style="background-color:rgba(0,0,0,0.5); font-weight: bold; border:none;">詳細</a>

                </div>
            </div>
            <h6 class="pt-2">投稿日時：{{$post->updated_at}}</h6>
        </div>
    </div>
</div>