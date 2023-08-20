<div class="p-6 text-gray-900">

    @if($post->category_id == 1)
    <div class="card" style="background-color: rgba(0, 0, 255, 0.1);">
    @elseif($post->category_id == 2)
    <div class="card" style="background-color: rgba(0, 255, 0, 0.1);">
    @else
    <div class="card" style="background-color: rgba(255, 0, 0, 0.1);">
        @endif

        <div class="card-header flex justify-between py-1 px-2 text-xs sm:text-base ">
            <div>投稿 No.{{$post->id}}</div>
            <div>{{$post->updated_at}}</div>
        </div>
        <div class="p-2 sm:m-2">
            <h5 class="card-title" style="font-weight: bold">{{$post->title}}</h5>
            <div class="flex flex-col px-3">
                <span class="pr-3 text-lg">
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
                    <div class="flex flex-row justify-between">        
                        <div>
                            カテゴリー：
                            <a href="{{route('posts.index', ['category_id'=> $post->category_id])}}" class="font-semibold">
                                {{$post->category->category_name}}
                            </a>
                        </div>
                    </div>
                </span>
            </div>


            
            <div class="card" style="background-color: rgba(255, 0, 0, 0);">
                <div class="p-2 sm:m-2" style="position:relative; ">
                    @if($post->image)
                    {{-- <img src="{{ asset('storage/' . $post->image) }}" alt="Uploaded Image" style="padding: 5px; float:right; margin-right: 0; margin-left: auto; max-height:140px; max-width:140px;"> --}}
                    <img src="{{Storage::disk('s3')->temporaryUrl($post->image, now()->addMinutes(1))}}" alt="Uploaded Image" style="padding: 5px; float:right; margin-right: 0; margin-left: auto; max-height:140px; max-width:140px;">
                    @endif
                    {!! mb_strlen($post->content) > 100 ? nl2br(e(mb_substr($post->content, 0, 100))) . '...' : nl2br(e($post->content)) !!}
                    <!-- <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary" style="float:right; margin-right:5px; margin-bottom:0; background-color:rgba(0,0,0,0.5); font-weight: bold; border:none;">詳細</a> -->
                </div>
            </div>
            <div class="flex flex-col items-center">
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary custom-btn py-0 mt-2" style=" width:100%; font-weight: bold;">詳細</a>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-btn {
    background-color: #0005;
    border-color: #a8a8a8;
    color: #ffffff;
    }
    .custom-btn:hover {
        background-color: #0007;
    }
</style>