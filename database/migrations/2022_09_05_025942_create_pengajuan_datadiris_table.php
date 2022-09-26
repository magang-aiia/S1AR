<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanDatadirisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_datadiris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('kode_p_datadiri')->unique();
            $table->string('status');
            $table->string('nama');
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->string('sta_nikah');
            $table->string('email')->unique();
            $table->string('no_hp')->unique();
            $table->string('no_npwp');
            $table->integer('no_ktp');
            $table->text('alamat_dom');
            $table->text('alamat_ktp');
            $table->string('nama_istri');
            $table->integer('jml_anak');
            $table->string('nama_anak1');
            $table->string('nama_anak2');
            $table->string('nama_anak3');
            $table->string('file_bukti');
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
        Schema::dropIfExists('pengajuan__datadiris');
    }
}
