<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jml_pinjam')->unsigned();
            $table->bigInteger('jml_anggsuran')->unsigned();
            $table->bigInteger('bunga')->unsigned()->nullable();
            $table->string('status');
            $table->string('keterangan');
            $table->bigInteger('total')->unsigned()->nullable();
            $table->unsignedBigInteger('id_anggota');
            $table->foreign('id_anggota')->references('id')->on('members');
            $table->unsignedBigInteger('id_simpanan');
            $table->foreign('id_simpanan')->references('id')->on('deposits');
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
        Schema::dropIfExists('applications');
    }
}
