<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreatePriceListPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_list_positions', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('price_list_id')
                ->references('id')
                ->on('price_lists')
                ->onDelete('cascade');
            $table->text('name');
            $table->string('article');
            $table->integer('price');
        });
        Artisan::call('db:seed --class="PriceListPositionSeeder" --force');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_list_positions');
    }
}
