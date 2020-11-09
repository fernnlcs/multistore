<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->onDelete('no action')->onUpdate('cascade');
            $table->foreignId('sold_by')->constrained('users')->onDelete('no action')->onUpdate('cascade');
            $table->foreignId('delivered_by')->constrained('users')->onDelete('no action')->onUpdate('cascade')->nullable();
            $table->foreignId('store')->constrained('stores')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('client')->nullable();
            $table->float('discount', 8, 2);
            $table->float('addition', 8, 2);
            $table->timestamp('delivered_at')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
