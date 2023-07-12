<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; align-items: baseline; justify-content: space-between;">
            <h2 class="font-mono font-bold text-4xl text-cyan-600 leading-tight bg-gradient-to-r from-green-500 via-blue-500 to-pink-500 bg-clip-text text-transparent">
                {{ __('原作・作画マッチング掲示板') }}
            </h2>

            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
            <form method="get" action="{{ route('posts.search')}}">
                {{csrf_field()}}
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="投稿内容を検索" name="search_query" />
                    <div class="input-group-btn">
                        <button class="btn btn-info btn-sm" type="submit">
                            <i class="fa fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </x-slot>



    <div class="card-body">
        @isset($search_result)
        <div style="font-weight: bold;">{{ $search_result }}</div>
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
                @include('posts.post-content')
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
    </div>

</x-app-layout>