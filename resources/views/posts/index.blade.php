<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; align-items: baseline; justify-content: space-between;">
            <h2 class="font-mono font-bold text-4xl text-cyan-600 leading-tight bg-gradient-to-r from-green-500 via-blue-500 to-pink-500 bg-clip-text text-transparent">
                {{ __('原作・作画マッチング掲示版') }}
            </h2>

            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
            <form method="get" action ="{{ route('posts.search')}}">
                {{csrf_field()}}
                <div>
                <input type="text" class="form-control-sm input-lg" placeholder="投稿内容を検索" name="search_query"/>
                <span class="input-group-btn" style = "position: relative; right: -0px; top: -1px;">
                    <button class="btn btn-info btn-sm" type="submit">
                        <i class="fa fa-search fa-sm"></i>
                    </button>
                </span>
                </div>
            </form>
    </x-slot>


   
    <div class = "card-body">
        @isset($search_result)
            <div style = "font-weight: bold;">{{ $search_result }}</div>
        @endisset
        @if(session('err_msg'))
        <p class="text_danger" style="color:red;">
            {{session('err_msg')}}
        </p>
        @endif
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                @foreach($posts as $post)
                <div class="p-6 text-gray-900">

                    @if($post->category_id == 1)
                        <div class="card" style="background-color: rgba(0, 255, 0, 0.1);">
                    @elseif($post->category_id == 2)
                        <div class="card" style="background-color: rgba(0, 0, 255, 0.1);">
                    @else
                        <div class="card" style="background-color: rgba(255, 0, 0, 0.1);">
                    @endif

                        <div class="card-header">
                            投稿 No.{{$post->id}}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: bold">{{$post->title}}</h5>
                            <span class="card-title">
                                投稿者：
                                <a href = "{{route('users.show', $post->user_id)}}">
                                    {{$post->user->name}}
                                </a>
                            </span>
                            <span class="card-title">
                                カテゴリー：
                                <a href="{{route('posts.index', ['category_id'=> $post->category_id])}}">
                                    {{$post->category->category_name}}
                                </a>
                            </span>
                            <div class="card" style="background-color: rgba(255, 0, 0, 0);">
                                <div class="card-body">
                                    <p class="card-text">{{$post->content}}</p>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary" style="background-color:rgba(0,0,0,0.5); font-weight: bold; border:none;">詳細</a>
                                                                
                                </div>
                            </div>
                            <h6Z>投稿日時：{{$post->updated_at}}</h6>
                            
                        </div>
                    </div>
                </div>
                @endforeach

                @isset($category_id)
                    {{ $posts->appends(['category_id' => $category_id])->links()}}
                @elseif(isset($search_query))
                    {{ $posts->appends(['search_query' => $search_query])->links()}}
                @else
                    {{ $posts->links()}}
                @endisset

            </div>
        </div>
        <!-- </div> -->
    </div>
    
</x-app-layout>
