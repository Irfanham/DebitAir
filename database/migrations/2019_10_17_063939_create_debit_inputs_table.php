<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebitInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debit_inputs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('debit_location_id')->unsigned();
            $table->float('debit');
            $table->timestamps();

            $table->foreign('debit_location_id')
                    ->references('id')->on('debit_locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debit_inputs');
    }
}
