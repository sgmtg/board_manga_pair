<div class="p-6 text-gray-900">

    @if($post->category_id == 1)
    <div class="card" style="background-color: rgba(0, 0, 255, 0.1);">
    @elseif($post->category_id == 2)
    <div class="card" style="background-color: rgba(0, 255, 0, 0.1);">
    @else
    <div class="card" style="background-color: rgba(255, 0, 0, 0.1);">
        @endif

        <div class="card-header px-2 py-1 flex justify-between text-xs">
            <div>投稿 No.{{$post->id}}</div>
            <div>{{$post->updated_at}}</div>
        </div>
        <div class="card-body p-2">
            <h5 class="card-title" style="font-weight: bold">{{$post->title}}</h5>
            <div class="flex">
                <div class="flex flex-col px-3">
                    <span class=" pr-5 text-lg">
                        投稿者：
                        @if($post->user)
                        <a href="{{route('users.show', $post->user_id)}}" class="font-semibold">
                            {{$post->user->name}}
                        </a>
                        @else
                            <span class="font-semibold">non-user</span>
                        @endif
                    </span>
                    <span class="text-base mb-2">
                        カテゴリー：
                        <a href="{{route('posts.index', ['category_id'=> $post->category_id])}}" class="font-semibold">
                            {{$post->category->category_name}}
                        </a>
                    </span>
                </div>

            </div>
            <div class="card" style="background-color: rgba(255, 0, 0, 0);">
                <div class="card-body p-2">
                    
                    
                    <div class="flex">
                        <div class="w-2/3 mr-2">
                            <p class="card-text">{{$post->content}}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary" style="background-color:rgba(0,0,0,0.5); font-weight: bold; border:none;">詳細</a>
                        </div> 
                        <div class="w-1/3">
                            @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Uploaded Image" style="width: 320px;">
                            @endif            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>