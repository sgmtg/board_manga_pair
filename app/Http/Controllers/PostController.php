<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Storage;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->query();
        
        if(isset($q['category_id'])){
            $posts = Post::latest()->where('category_id', $q['category_id'])->paginate(10);
            $posts -> load('category', 'user');
            // dd($posts);
            $category_name = Category::find($q['category_id'])->category_name;
            $search_result = '['.$category_name.']カテゴリーの投稿を表示しています('.$posts->total()."件)"; 


            return view('posts.index',[
                'posts' => $posts,
                'category_id' => $q['category_id'],
                'search_result' => $search_result,
            ]);
        }else{
            $posts = Post::latest()->paginate(10);
            $posts -> load('category', 'user');


            return view('posts.index',[
                'posts' => $posts,
            ]);
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create',[
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = new Post;
        $input = $request->only($post->getFillable());


        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                // 画像をaws s3に保存
                if (app()->isLocal() || app()->runningUnitTests()) {
                    // ローカル環境の場合
                    $path = Storage::disk('s3')->put('/test', $request->file('image'));
                } else {
                    // 本番環境の場合　aws s3に保存
                    $path = Storage::disk('s3')->put('/production', $request->file('image'));
                }
                $input['image'] = $path;
            }
        }        
        
        // 登録
        $post = $post->create($input);
        // Post::create($inputs);でもよい

        Session::flash('status', '新規投稿が完了しました!');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    //渡されるのはidだがPost $postとすることで自動で対応する$postを取ってきてくれる
    {
        $post->load('category', 'user', 'comments.user');
        // dd($post);
        return view('posts.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { 
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Search the specified resource from storage.
     */
    
    public function search(Request $request)
    {
        // 投稿の検索機能を作成する
        $search_query = $request->search_query;
        $posts = Post::latest()->where('title', 'like', "%$search_query%")
        ->orWhere('content', 'like', "%$search_query%")
        ->orWhereHas('user', function($query) use ($search_query) {
            $query->where('name', 'like', "%$search_query%");
        })
        ->paginate(5);

        $search_result = '"'.$search_query.'"の検索結果：'.$posts->total()."件"; 

        return view('posts.index',[
            'posts' => $posts,
            'search_result' => $search_result,
            'search_query' => $search_query,
        ]);
    }
}
