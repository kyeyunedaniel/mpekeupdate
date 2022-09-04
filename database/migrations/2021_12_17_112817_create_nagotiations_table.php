<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNagotiationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nagotiations', function (Blueprint $table) {
            $table->id();
            $table->string('contract_id');            
            $table->string('buyer_id'); 
             $table->string('farmer_id');       
            $table->string('farmer_price');
            $table->string('buyer_price');
            $table->string('buyer_reason');
            $table->string('farmer_reason');
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
        Schema::dropIfExists('nagotiations');
    }
}
