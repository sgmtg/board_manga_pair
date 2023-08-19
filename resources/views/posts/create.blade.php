<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('新規投稿の作成') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-header">
                            
                        </div>
                        <div class="card-body bg-gray-300 font-semibold">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label for="exampleInputTitle">タイトル</label><span style="color:#f00; font-size: small;"> (必須)</span>
                                    <input type="text" class="form-control" id="exampleInputTitle" placeholder="" name="title" value="{{ old('title')}}">
                                </div>

                                <div class="form-group flex-1">
                                        <label for="exampleFormControlSelect1">カテゴリー</label><span style="color:#f00; font-size: small;"> (必須)</span>
                                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                            <option selected="">選択してください</option>   
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="flex">
                                    <div class="form-group flex-1 pr-10">
                                            <label for="age">年齢</label>
                                            <select class="form-control" id="age" name="age">
                                                <option value="0" {{ old('age') == "0" ? 'selected' : '' }}>非公開</option>
                                                <option value="1" {{ old('age') == "1" ? 'selected' : '' }}>学生</option>
                                                <option value="2" {{ old('age') == "2" ? 'selected' : '' }}>20代</option>
                                                <option value="3" {{ old('age') == "3" ? 'selected' : '' }}>30代以上</option>
                                            </select>
                                    </div>
                                    <div class="form-group flex-1">
                                            <label for="sex">性別</label>
                                            <select class="form-control" id="sex" name="sex" value="{{ old('sex') }}">
                                                <option value="0"  {{ old('sex') == "0" ? 'selected' : '' }}>非公開</option>
                                                <option value="1"  {{ old('sex') == "1" ? 'selected' : '' }}>男性</option>
                                                <option value="2"  {{ old('sex') == "2" ? 'selected' : '' }}>女性</option>
                                                <option value="9"  {{ old('sex') == "9" ? 'selected' : '' }}>その他</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="content">自由記述欄：</label><span style="color:#f00; font-size: small;"> (必須)</span>
                                    <textarea class="form-control" rows="5" id="content" placeholder="" name="content">{{ old('content') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="genre">描きたいジャンル</label>
                                    <input type="text" class="form-control" id="genre" placeholder="SF/少女漫画/バトル/ラブコメ/ギャグ/ホラー/R18...などなど" name="genre" value="{{ old('genre') }}">
                                </div>
                                <div class="form-group">
                                    <label for="favorite">好きな作品</label>
                                    <input type="text" class="form-control" id="favorite" placeholder="" name="favorite"  value="{{ old('favorite') }}">
                                </div>
                                <div class="form-group">
                                    <label for="image">作風の参考となるもの</label>
                                    <span id="image-selected" style="color:#0008;">
                                        <input type="file" class="form-control-file" id="image" placeholder="" name="image"  value="{{ old('image') }} ">
                                    </span>
                                    </label><span style="color:#000; font-size: small;">32MB以下のJPEG/GIF/PNGをアップロードできます</span>
                                </div>  
                                <div class="form-group">
                                    <label for="twitter">Twitter（アカウントのユーザ名）</label>
                                    <input type="text" class="form-control" id="twitter" placeholder="@より下の部分を記入してください" name="twitter"  value="{{ old('twitter') }}">
                                </div>                                 
                                <div class="form-group">
                                    <label for="url">その他URL（ホームページなど）</label>
                                    <input type="text" class="form-control" id="url" placeholder="urlを入力してください" name="url"  value="{{ old('url') }}">
                                </div>     
 
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                                <button type="submit" class="btn btn-primary mt-4" style="background-color:rgba(0,0,0,0.5); font-weight: bold; border:none;">投稿</button>

                            </form>   
                        </div>
                    </div>
                </div>

                
            </div>
        <!-- </div> -->
    </div>
    <script>
    document.getElementById('image').addEventListener('change', function() {
        if (this.files.length > 0) {
            document.getElementById('image-selected').style.color = '#00f8';
        } else {
            document.getElementById('image-selected').style.color = '#0008';
        }
    });
    </script>
</x-app-layout>
