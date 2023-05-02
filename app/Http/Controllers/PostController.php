<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $posts -> load('category', 'user');
        // dd($posts);
        return view('posts.index',[
            'posts' => $posts,
            // 'header2'=>  'headhead'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create',[]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // dd($request);
        //ブログのデータを受け取る
        // $inputs = $request->all();だと余計な属性があるかもしれない
        $post = new Post;
        $input = $request->only($post->getFillable());
        //登録
        $post = $post->create($input);
        // Post::create($inputs);でもよい
        \Session::flash('err_msg', '新規投稿が完了しました!');
        return redirect()->route('posts.index');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    //渡されるのはidだがPost $postとすることで自動で対応する$postを取ってきてくれる
    {
        $post->load('category', 'user');
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
}
