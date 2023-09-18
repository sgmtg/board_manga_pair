<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Mail\NewCommentMail;

use App\Jobs\SendNewCommentMail; 

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
                 
        Session::flash('status', '新規コメントが完了しました!');

        $postOwner = $comment->post->user;  // ユーザ登録されていない場合nullになる
        if ($postOwner) {
            $commenterName = $comment->user? $comment->user->name : 'non-user';
            // コメント主が投稿主と同じ場合は通知しない
            if ($postOwner->id !== $comment->user_id){
                $url = route('posts.show', $comment->post_id);
                // Mail::to($postOwner->email)->send(new NewCommentMail($commenterName, $postOwner->name, $url));
                // 非同期ジョブをディスパッチする
                dispatch(new SendNewCommentMail($commenterName, $postOwner->name, $url, $postOwner->email));
            }
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
