<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('warehouse_id');
            $table->string('price');
            $table->string('booked');
            $table->string('user_id');
            $table->string('quantity');
            $table->string('quality');
            $table->string('Land_size');
            $table->string('MaizeType');
            $table->string('maize_status');
            $table->string('location');
            $table->string('date_available');
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
        Schema::dropIfExists('contracts');
    }
}
