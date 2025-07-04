<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiostatistikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biostatistik', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->unsignedBigInteger('id_pasien')->nullable();
            $table->integer('usia')->nullable();
            $table->string('jenis_kelamin', 255)->nullable();
            $table->string('diagnosis', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biostatistik');
    }
}
