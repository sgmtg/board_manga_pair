<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Mail\NewCommentMail;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $q = $request->query();
        return view('comments.create',['post_id'=>$q['post_id']]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $comment = new Comment;
        $input = $request->only($comment->getFillable());
        $comment = $comment->create($input);
        // Comment::create($input);でもよい
                 
        // \Session::flash('err_msg', '新規コメントが完了しました!');

        $url = route('posts.show', $comment->post_id);
        $postOwner = $comment->post->user;  // ユーザ登録されていない場合nullになる
        if ($postOwner) {
            $commenterName = $comment->user? $comment->user->name : 'non-user';
            Mail::to($postOwner->email)->send(new NewCommentMail($commenterName, $postOwner->name, $url));
        }


        // return redirect('posts/'.$comment->post_id);//これでもよい
        return redirect()->route('posts.show', $comment->post_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
