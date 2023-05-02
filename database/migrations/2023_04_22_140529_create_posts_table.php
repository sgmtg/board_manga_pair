<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    
    //void は、「このメソッドは何も返さない」ということを示しています。
    //PHP 7.1以降からは、返り値の型宣言が推奨されて
    public function up(): void
    {
        if (!Schema::hasTable('posts')) { //もしpostsという名前のテーブルがなかったら実行
            // Schemaはファサードで、 これ(Facades) は、Laravelのアプリケーション内で使用される静的なクラス
            Schema::create('posts', function (Blueprint $table) {
                //Blueprint クラスは、テーブルのスキーマを定義するために使用されるメソッドを提供
                //$tableはBlueprint クラスのインスタンスを格納するために使用される
                $table->bigIncrements('id');
                $table->bigInteger('user_id')->unsigned()->index();
                $table->bigInteger('category_id')->unsigned()->index();

                $table->string('title')->nullable();
                $table->text('content')->nullable();

                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

                $table->timestamps(); //作った時間と更新時間created_at と updated_at カラムを追加する
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
