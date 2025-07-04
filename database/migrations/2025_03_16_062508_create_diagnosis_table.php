<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->string('kode', 255)->nullable();
            $table->text('penjelasan_umum')->nullable();
            $table->text('kategori_bab')->nullable();
            $table->text('organ_terkait')->nullable();
            $table->text('definisi_penyakit')->nullable();
            $table->text('kategori_penyakit')->nullable();
            $table->text('kaidah_koding')->nullable();
            $table->text('hasil_anamnesis')->nullable();
            $table->text('hasil_pemeriksaan')->nullable();
            $table->text('penegakan_diagnosis')->nullable();
            $table->text('penatalaksanaan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnosis');
    }
}
