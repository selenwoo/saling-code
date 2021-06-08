<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('pro_model');
            $table->string('pro_name');
            $table->string('pro_name_en');//产品英文名
            $table->integer('pro_category'); //产品分类，对应分类表里ID
            $table->integer('pro_sort')->default(0);//排序用
            $table->integer('pro_ifhot')->default(0);//推荐
            $table->text('pro_img');//产品图片
            $table->text('pro_listimg');//单张图
            $table->text('pro_feature');//产品特点
            $table->text('pro_feature_en');//产品特点-英文
            $table->text('pro_intro');//产品介绍
            $table->text('pro_intro_en');//产品介绍-英文
            $table->text('pro_parameter');//产品参数
            $table->text('pro_parameter_en');//产品参数-英文
            $table->text('pro_manual');//产品说明书下载地址

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
