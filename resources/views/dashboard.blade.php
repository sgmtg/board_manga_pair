<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MyPage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("ログイン中") }}
                </div>
            </div>
        </div>
    </div>

    <!-- スイッチボタン -->
    <!-- <div class="flex justify-center mb-4">
        <button id="showPostsBtn" class="mr-4 bg-blue-500 text-white px-4 py-2 rounded">あなたの投稿</button>
        <button id="showCommentsBtn" class="bg-blue-500 text-white px-4 py-2 rounded">過去にあなたがコメントした投稿</button>
    </div> -->
    <div id="switchButtons" class="flex justify-center">
        <button id="showPostsBtn" class="font-bold mr-4 py-2 px-4 hover:text-black hover:opacity-100 focus:outline-none">あなたの投稿</button>
        <button id="showCommentsBtn" class="font-bold py-2 px-4 hover:text-black hover:opacity-100 focus:outline-none">過去にあなたが<br>コメントした投稿</button>
    </div>

        
    <div id="postsDiv" class="bg-green-100 flex flex-col items-center mb-10 sm:mx-32 pt-6 pb-6">
        <!-- あなたの投稿 -->
        @foreach($my_posts as $post)
        <div class="bg-gray-300 w-3/5 m-2 px-4 border rounded">
        
            <div class="flex flex-col sm:flex-row sm:justify-between text-xs -mx-4">
                <div>投稿 No.{{$post->id}} </div>
                <div>{{$post->updated_at}}</div>
            </div>
            <a href="{{ route('posts.show', $post->id) }}" class="text-green-600"><div class="font-bold">{{$post->title}}</div></a>
        </div>
        @endforeach
    </div>

    <div id="commentsDiv" class="bg-blue-100 flex flex-col items-center mb-10 sm:mx-32 pt-6 pb-6" style="display: none;">
        <!-- 過去にあなたがコメントした投稿 -->
        @foreach($commented_posts as $post)
        <div class="bg-gray-300 w-3/5 m-2 px-4 border rounded">
        
            <div class="flex flex-col sm:flex-row sm:justify-between text-xs -mx-4">
                <div>投稿 No.{{$post->id}} </div>
                <div>{{$post->updated_at}}</div>
            </div>
            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600"><div class="font-bold">{{$post->title}}</div></a>
        </div>
        @endforeach
    </div>

    <script>
    //     document.getElementById('showPostsBtn').addEventListener('click', function() {
    //     document.getElementById('userPosts').style.display = 'flex';
    //     document.getElementById('userComments').style.display = 'none';
    // });

    // document.getElementById('showCommentsBtn').addEventListener('click', function() {
    //     document.getElementById('userPosts').style.display = 'none';
    //     document.getElementById('userComments').style.display = 'flex';
    // });

    document.addEventListener('DOMContentLoaded', function () {
        let postsDiv = document.getElementById('postsDiv');
        let commentsDiv = document.getElementById('commentsDiv');
        let showPostsBtn = document.getElementById('showPostsBtn');
        let showCommentsBtn = document.getElementById('showCommentsBtn');

        // 初期状態の設定
        postsDiv.style.display = 'flex';
        commentsDiv.style.display = 'none';
        showPostsBtn.classList.add('bg-green-100');
        showCommentsBtn.classList.add('bg-blue-100');
        showCommentsBtn.classList.add('opacity-50');

        showPostsBtn.addEventListener('click', function () {
            postsDiv.style.display = 'flex';
            commentsDiv.style.display = 'none';
            showPostsBtn.classList.remove('opacity-50');
            showCommentsBtn.classList.add('opacity-50');
        });

        showCommentsBtn.addEventListener('click', function () {
            postsDiv.style.display = 'none';
            commentsDiv.style.display = 'flex';
            showPostsBtn.classList.add('opacity-50');
            showCommentsBtn.classList.remove('opacity-50');
        });
    });

    </script>

</x-app-layout>

