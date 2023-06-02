<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Board') }}
        </h2>
    </x-slot>


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <div class = "card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h6 class = "card-title" style = "font-weight: bold;">検索フォーム</h6>
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <form method="POST" action ="{{ route('posts.search')}}">
                                {{csrf_field()}}
                                <input type="text" class="form-control input-lg" placeholder="Buscar" name="search_word"/>
                                <span class="input-group-btn" style = "position: relative; right: -186px; top: -38px;">
                                    <button class="btn btn-info" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @isset($search_result)
        <div style = "font-weight: bold;">{{ $search_result }}</div>
        @endisset
    </div>


    <div class="py-2">
        @if(session('err_msg'))
        <p class="text_danger" style="color: blue;">
            {{session('err_msg')}}
        </p>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                            投稿 No.{{$post->id}}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
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
                {{ $posts->links() }}
            </div>
        </div>
        <!-- </div> -->
    </div>
    
</x-app-layout>
