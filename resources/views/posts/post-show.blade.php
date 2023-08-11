<div class="p-6 text-gray-900">
    @php
        $backgroundColors = [
            1 => 'rgba(0, 0, 255, 0.1)',
            2 => 'rgba(0, 255, 0, 0.1)',
            3 => 'rgba(255, 0, 0, 0.1)'
        ];
        $textColors = [
            1 => 'text-blue-700',
            2 => 'text-green-700',
            3 => 'text-red-700'
        ];

        $selectedBgColor = $backgroundColors[$post->category_id];
        $selectedTextColor = $textColors[$post->category_id];
    @endphp

    <div class="card" style="background-color: {{ $selectedBgColor }};">

        <div class="card-header flex justify-between text-sm">
            <div>投稿 No.{{$post->id}}</div>
            <div>{{$post->updated_at}}</div>
        </div>
        <div class="card-body">
            <h5 class="card-title" style="font-weight: bold">{{$post->title}}</h5>
                <hr>
                <!-- <hr style="border-top: 3px solid gray;"> -->
                <div class="flex flex-col sm:flex-row">
                    <div class="flex-auto  m-1 p-3 border-2 rounded border-gray-300" style="min-width: 240px;">
                        <div>
                            <span class="card-title text-lg">
                                投稿者：
                                @if($post->user)
                                <a href="{{route('users.show', $post->user_id)}}" class="font-semibold">
                                    {{$post->user->name}}
                                </a>
                                @else
                                    <span class="font-semibold">non-user</span>
                                @endif
                            </span>
                        </div>
                        <div>
                            <span class="card-title text-base">
                                カテゴリー：
                                <a href="{{route('posts.index', ['category_id'=> $post->category_id])}}" class="font-semibold">
                                    {{$post->category->category_name}}
                                </a>
                            </span>
                        </div>
                        <div class="">
                            <span class="card-title text-lg">
                                年齢：
                                @if($post->age == '0')
                                -
                                @elseif($post->age == '1')
                                学生
                                @elseif($post->age == '2')
                                20代
                                @elseif($post->age == '3')
                                30代以上
                                @endif
                            </span>
                        </div>

                        <div class="">
                            <span class="card-title text-lg">
                                性別：
                                @if($post->sex == '0')
                                -
                                @elseif($post->sex == '1')
                                男性
                                @elseif($post->sex == '2')
                                女性
                                @elseif($post->sex == '9')
                                その他
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="flex-auto m-1 p-1">
                    @if($post->image)
                        <span class="card-title text-lg">
                            <div>作風：</div>
                        </span>
                        <a href="{{ asset('storage/' . $post->image) }}" data-lightbox="image-1" data-title="">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Uploaded Image" class="max-w-full object-cover mx-2 pb-6" style="max-height: 240px;">
                        </a>
                    @endif
                    </div>
                </div>

                <hr>

            <span class="text-lg">自由記述欄：</span>
            <div class="border-2 rounded border-gray-300" style="background-color: rgba(0, 0, 0, 0);">
                <div class="card-body">
                    <p class="card-text">
                            {!!  nl2br(e($post->content)) !!}
                    </p>
                </div>
            </div>
            
            <div class="mt-3">
                <span class="card-title text-lg {{$selectedTextColor}}">
                    ・描きたいジャンル：
                </span>
                @if($post->genre)
                {{$post->genre}}
                @else
                -
                @endif
            </div>
            <div>
                <span class="card-title text-lg {{$selectedTextColor}}">
                    ・好きな漫画：
                </span>
                @if($post->favorite)
                {{$post->favorite}}
                @else
                <span class="pl-3">-</span>
                @endif
            </div>
            <div>
                <span class="card-title text-lg {{$selectedTextColor}}">
                    ・Twitter：
                </span>
                @if($post->twitter)
                <a href="https://twitter.com/{{$post->twitter}}" rel="nofollow">{{$post->twitter}}</a>
                @else
                <span class="pl-3">-</span>
                @endif
            </div>
            <div>
                <span class="card-title text-lg {{$selectedTextColor}}">
                    ・その他URL：
                </span>
                @if($post->url)
                <a href="{{$post->url}}" rel="nofollow">{{$post->url}}</a>
                @else
                <span class="pl-3">-</span>
                @endif
            </div>
        </div>

    </div>
</div>