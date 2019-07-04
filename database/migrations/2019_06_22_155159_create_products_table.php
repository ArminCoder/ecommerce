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
            $table->string('category')->default('Running');
            $table->integer('price');
            $table->string('gender')->default('male');                        
            $table->string('brand')->default('Other');                                             
            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->boolean('size_35')->default(false);
            $table->boolean('size_36')->default(false);
            $table->boolean('size_37')->default(false);
            $table->boolean('size_38')->default(false);
            $table->boolean('size_39')->default(false);
            $table->boolean('size_40')->default(false);
            $table->boolean('size_41')->default(false);
            $table->boolean('size_42')->default(false);
            $table->boolean('size_43')->default(false);
            $table->boolean('size_44')->default(false);
            $table->boolean('size_45')->default(false);
            $table->boolean('size_46')->default(false);
            $table->boolean('size_47')->default(false);
            $table->boolean('size_48')->default(false);
            $table->boolean('size_49')->default(false);

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
