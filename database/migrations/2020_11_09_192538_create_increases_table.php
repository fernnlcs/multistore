<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncreasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('increases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->onDelete('no action')->onUpdate('cascade');
            $table->foreignId('received_by')->constrained('users')->onDelete('no action')->onUpdate('cascade');
            $table->foreignId('store')->constrained('stores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('product')->constrained('products')->onDelete('restrict')->onUpdate('cascade');
            $table->float('amount', 8, 2);
            $table->float('primary_unit_price', 8, 2);
            $table->float('discount', 8, 2);
            $table->float('addition', 8, 2);
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
        Schema::dropIfExists('increases');
    }
}
