<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\User;
use App\Models\Post;
use App\Models\Comment;


class UserController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)#string $idを削除
    {
        $user->load(['posts' => function ($query) {
            $query->latest();
        }]);
        return view('users.show',['user'=>$user]);
    }

    public function dashboard()
    {
        $userId = auth()->id();
        $my_posts = Post::latest()->where('user_id', $userId)->get();

        // Commentモデルから該当するuser_idを持つレコードを新しい順に取得
        $comments = Comment::where('user_id', $userId)->latest()->get();

        // 上記のコメントから関連するpost_idを順番に取得
        $postIds = $comments->pluck('post_id');

        // post_idの順番に従ってPostモデルからレコードを取得
        $commented_posts = Post::whereIn('id', $postIds)
        ->orderByRaw("FIELD(id, " . implode(',', $postIds->toArray()) . ")")
        ->get();

        return view('dashboard', [
            'my_posts' => $my_posts,
            'commented_posts' => $commented_posts
        ]);
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
