<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row items-baseline justify-between">
            <h2 class="pb-2 font-mono font-bold text-2xl text-cyan-600 leading-tight bg-gradient-to-r from-green-500 via-blue-500 to-pink-500 bg-clip-text text-transparent sm:text-4xl">
                原作・作画マッチング掲示板
            </h2>
            <div style="margin: 0 0 0 auto;">
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
        </div>
    </x-slot>



    <div class="card-body">
        @isset($search_result)
        <div style="font-weight: bold;">{{ $search_result }}</div>
        @endisset
        @if(session('status'))
        <p class="text_danger" style="color:red;">
            {{session('status')}}
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