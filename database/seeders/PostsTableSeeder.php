<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;// 追加

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'user_id'=>'1',
                'category_id'=>'1',
                'title'=>'hoge1',
                'content'=>'test1'
            ],
            [
                'user_id'=>'1',
                'category_id'=>'2',
                'title'=>'hoge2',
                'content'=>'test2'
            ],
            [
                'user_id'=>'1',
                'category_id'=>'1',
                'title'=>'hoge1',
                'content'=>'test3'
            ],
        ]);
    }
}
