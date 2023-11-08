<x-app-layout>
    <x-slot name="header">
        <div class="flex items-end justify-between">
            <h2 class=" font-mono font-bold text-2xl text-cyan-600 leading-tight bg-gradient-to-r from-green-500 via-blue-500 to-pink-500 bg-clip-text text-transparent sm:text-4xl">
                原作・作画マッチング掲示板
            </h2>
        </div>
    </x-slot>
    
    <div class="m-6 block sm:grid grid-flow-col justify-stretch items-center bg-gray-100">
        <div class="flex justify-start items-end">
            <div class="text-lg sm:text-2xl font-semibold text-gray-500">
                探す： 
            </div>
            <div>    
                <a href="{{ route('posts.index', ['category_id'=> 2]) }}"
                    style="word-wrap: break-word; display: block; box-sizing: border-box;"                
                    class="text-base sm:text-xl ml-1 px-2 border-x-2 border-green-300 bg-white rounded-md font-semibold text-green-400 hover:text-green-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-none">
                    原作者
                </a>
            </div>
            <div>
                <a href="{{ route('posts.index', ['category_id'=> 1]) }}"
                    style="word-wrap: break-word; display: block; box-sizing: border-box;"
                    class="text-base sm:text-xl mx-1 px-2 border-x-2 border-blue-300 bg-white rounded-md font-semibold text-blue-400 hover:text-blue-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-none">
                    作画家
                </a>
            </div>
            <div>
                <a href="{{ route('posts.index', ['category_id'=> 3]) }}"
                    style="word-wrap: break-word; display: block; box-sizing: border-box;"
                    class="text-base sm:text-xl px-2 border-x-2 border-red-300 bg-white rounded-md font-semibold text-red-400 hover:text-red-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-none">
                    その他
                </a>
            </div>
        </div>
        <div class="sm:mx-8  my-3 sm:my-0">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
            <form method="get" action="{{ route('posts.search')}}">
                {{csrf_field()}}
                <div class="input-group input-group-sm">
                    <span class="text-base sm:text-lg font-semibold text-gray-500">フリーワード：</span>
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

    <div class="card-body">
        @isset($search_result)
        <div style="font-weight: bold;">{{ $search_result }}</div>
        @endisset
        @if(session('status'))
        <p class="text_danger" style="color:red;">
            {{session('status')}}<br>
            このサイトに関してご意見・ご要望がありましたら、<a href="https://docs.google.com/forms/d/e/1FAIpQLSf2DRj1PlOOuEgGg_DZ9maAt1AJruWkFF2_i9sM9N9kh1OoTw/viewform?usp=sf_link" class="text-blue-600">こちら</a>からお願いします。
        </p>
        @endif
    </div>


    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @foreach($posts as $post)
                @include('posts.post-thumbnail')
                @endforeach

                <div class="flex flex-col justify-center items-center">
                    <div class="">
                        {{ $posts->total() }}件中{{ $posts->firstItem() }}〜{{ $posts->lastItem() }} 件を表示
                    </div>
                    <div class="background-color: #8c8c8c;">    
                        @isset($category_id)
                        {{ $posts->appends(['category_id' => $category_id])->links()}}
                        @elseif(isset($search_query))
                        {{ $posts->appends(['search_query' => $search_query])->links()}}
                        @else
                        {{ $posts->links() }}
                        @endisset
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>