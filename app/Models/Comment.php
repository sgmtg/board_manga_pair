<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
    ];

    protected $casts = [
        'user_id' => 'integer',
        // 他のキャスティング定義もここに追加
    ];



    public function user(){
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    } 
    public function post(){
        return $this->belongsTo(\App\Models\Post::class, 'post_id');
    } 
}
