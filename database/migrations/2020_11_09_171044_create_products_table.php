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
            $table->foreignId('created_by')->constrained('users')->onDelete('no action')->onUpdate('cascade');
            $table->foreignId('store')->constrained('stores')->onDelete('cascade')->onUpdate('cascade');
            $table->string('barcode')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->float('default_price', 8, 2);
            $table->string('description')->nullable();
            $table->string('measure')->nullable();
            $table->string('color')->nullable();
            $table->boolean('visible');
            $table->boolean('stockable');
            $table->boolean('orderable');
            $table->boolean('offerable');
            $table->boolean('groupable');
            $table->boolean('divisible');
            $table->boolean('deliverable');
            $table->timestamp('expiration')->nullable();
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
