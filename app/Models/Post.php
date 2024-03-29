<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content',
        'sex',
        'age',
        'genre',
        'favorite',
        'image',
        'twitter',
        'url',
    ];

    public function category(){
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    } 
    public function user(){
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    } 
    public function comments(){
        return $this->hasMany(\App\Models\Comment::class,'post_id' ,'id');
    } 
}
