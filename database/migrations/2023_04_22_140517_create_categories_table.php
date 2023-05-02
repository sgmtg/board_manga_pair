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
        if (!Schema::hasTable('categories')) { //もしcategoriesという名前のテーブルがなかったら実行
            // Schemaはファサードで、 これ(Facades) は、Laravelのアプリケーション内で使用される静的なクラス
            Schema::create('categories', function (Blueprint $table) {
                //Blueprint クラスは、テーブルのスキーマを定義するために使用されるメソッドを提供
                //$tableはBlueprint クラスのインスタンスを格納するために使用される
                $table->bigIncrements('id');
                $table->string('category_name', 50)->nullable();; //カラムを文字列型で定義、最大50文字 nullableなので空欄あり
                $table->timestamps(); //作った時間と更新時間created_at と updated_at カラムを追加する
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
