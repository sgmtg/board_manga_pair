<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Board') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form action="{{route("posts.store")}}" method="POST">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label for="exampleInputTitle">タイトル</label>
                                    <input type="text" class="form-control" id="exampleInputTitle" placeholder="title" name="title">
                                </div>

                                <!-- <div class="form-group">
                                    <label for="exampleFormControlFile1">Example file input</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                                </div> -->

                                <div class="form-group">
                                        <label for="exampleFormControlSelect1">カテゴリー</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                            <option selected="">選択する</option>
                                            <option value="1">book</option>
                                            <option value="2">cafe</option>
                                            <option value="3">travel</option>
                                        </select>
                                </div>

                                <div class="form-group">
                                    <label for="comment">投稿内容:</label>
                                    <textarea class="form-control" rows="5" id="comment" name="content"></textarea>
                                </div>

                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                <button type="submit" class="btn btn-primary">投稿</button>
                            </form>   
                        </div>
                    </div>
                </div>

                
            </div>
        <!-- </div> -->
    </div>
</x-app-layout>
