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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('kode')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('npk');
            $table->string('avatar');
            $table->string('no_hp');
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->date('tgl_bergabung');
            $table->foreignId('kontrak_id')->constrained('kontraks')->onDelete('cascade');
            $table->string('gol');
            $table->string('sta_kerja');
            $table->string('sta_nikah');
            $table->string('sta_pajak');
            $table->string('no_bpjs_tk');
            $table->string('no_bpjs_kes');
            $table->string('no_dpa');
            $table->string('no_npwp');
            $table->string('no_ktp');
            $table->text('alamat_dom');
            $table->text('alamat_ktp');
            $table->string('nama_istri');
            $table->integer('jml_anak');
            $table->string('nama_anak1');
            $table->string('nama_anak2');
            $table->string('nama_anak3');
            $table->foreignId('approval1_id')->constrained('users')->onDelete('cascade');
            $table->set('approval1_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->foreignId('approval2_id')->constrained('users')->onDelete('cascade');
            $table->set('approval2_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->set('hr_confirm', ['pending', 'approved', 'rejected'])->default('pending');
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
