<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comment') }}
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
                            <form action="{{ route('comments.store') }}" method="POST">
                                {{csrf_field()}}

            
                                <!-- <div class="form-group">
                                    <label for="exampleFormControlFile1">Example file input</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                                </div> -->

             

                                <div class="form-group">
                                    <label for="comment">コメント内容:</label>
                                    <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                                </div>

                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="post_id" value="{{ $post_id }}">


                                <button type="submit" class="btn btn-primary">コメントする</button>
                            </form>   
                        </div>
                    </div>
                </div>

                
            </div>
        <!-- </div> -->
    </div>
</x-app-layout>
