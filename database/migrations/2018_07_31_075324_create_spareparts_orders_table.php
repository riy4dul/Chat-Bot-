<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparepartsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spareparts_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('spare_parts_id');
            $table->string('name');
            $table->text('address');
            $table->string('phone');
            $table->string('confirmation');
            $table->string('delivery');
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
        Schema::dropIfExists('spareparts_orders');
    }
}
