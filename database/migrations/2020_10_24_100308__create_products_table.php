<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('market_id');
            $table->json('category');
            $table->string('name');
            $table->string('product_code');
            $table->float('price');
            $table->float('sale_price')->nullable();
            $table->integer('stock');
            $table->json('images');
            $table->json('tecnique');
            $table->string('meta_desc');
            $table->longText('description');
            $table->string('show_count');
            $table->string('ad_type');
            $table->timestamps();
            $table->foreign('market_id')->references('id')->on('general_market')->onDelete('cascade');

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
