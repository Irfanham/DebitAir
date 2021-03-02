<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanamInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanam_inputs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tanam_id')->unsigned();
            $table->integer('tanam_period')->unsigned();
            $table->enum('tanam_period_time', [
                'Januari A',     'Januari B',
                'Februari A',    'Februari B',
                'Maret A',       'Maret B',
                'April A',       'April B',
                'Mei A',         'Mei B',
                'Juni A',        'Juni B',
                'Juli A',        'Juli B',
                'Agustus A',     'Agustus B',
                'September A',   'September B',
                'Oktober A',     'Oktober B',
                'November A',    'November B',
                'Desember A',    'Desember B',
                ]);
            $table->float('value');
            $table->timestamps();

            $table->foreign('tanam_id')
                    ->references('id')->on('tanams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanam_inputs');
    }
}
