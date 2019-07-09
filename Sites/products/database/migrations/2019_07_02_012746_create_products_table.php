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
            $table->string('name');
            $table->string('category_id');
            $table->string('brand');
            $table->string('description');
            $table->string('location');
            $table->float('alcohol_percentages');
            $table->integer('volumn_ml');
            $table->string('type');
            $table->integer('rating_up');
            $table->integer('rating_down');
            $table->float('unit_price');
            $table->float('package_sm_price');
            $table->integer('package_sm_qty');
            $table->float('package_lg_price');
            $table->integer('package_lg_qty');
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
        Schema::dropIfExists('products');
    }
}
