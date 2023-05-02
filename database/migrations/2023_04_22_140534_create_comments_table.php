<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('comments')) { //もしcommentsという名前のテーブルがなかったら実行
            // Schemaはファサードで、 これ(Facades) は、Laravelのアプリケーション内で使用される静的なクラス
            Schema::create('comments', function (Blueprint $table) {
                //Blueprint クラスは、テーブルのスキーマを定義するために使用されるメソッドを提供
                //$tableはBlueprint クラスのインスタンスを格納するために使用される
                $table->bigIncrements('id');
                $table->bigInteger('user_id')->unsigned()->index();
                $table->bigInteger('post_id')->unsigned()->index();

                $table->text('comment')->nullable();

                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

                $table->timestamps(); //作った時間と更新時間created_at と updated_at カラムを追加する
            });
        }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
