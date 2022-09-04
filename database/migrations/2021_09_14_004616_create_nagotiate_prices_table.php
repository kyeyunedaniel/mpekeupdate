<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNagotiatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *'',
        '',
        '',
        'reason',
     * @return void
     */
    public function up()
    {
        Schema::create('nagotiate_prices', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');            
            $table->string('user_id');       
            $table->string('price');
            $table->string('reason');
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
        Schema::dropIfExists('nagotiate_prices');
    }
}
