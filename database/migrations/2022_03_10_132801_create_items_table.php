<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();                                       //商品番号
            $table->bigInteger('user_id')->unsigned()->index(); //登録したユーザーのID
            $table->string('name', 100)->index();               //商品名
            $table->string('status', 100)->default('active');   //出品の不可
            $table->smallInteger('type')->nullable();           //種別 1トップス 2ボトムス 3アウター 4インナー 5アクセサリー6其の他
            $table->string('detail', 500)->nullable();          //商品詳細
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
