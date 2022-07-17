<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreatePriceListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_lists', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->text('name');
            $table->foreignId('provider_id')
                ->references('id')
                ->on('providers')
                ->onDelete('cascade');
            $table->date('duration');
            $table->foreignId('currency_id')
                ->references('id')
                ->on('currencies')
                ->onDelete('cascade');
        });
        Artisan::call('db:seed --class="PriceListSeeder" --force');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_lists');
    }
}
