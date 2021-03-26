<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('username', 20);
            $table->string('password', 255);
            $table->string('nama', 30);
            $table->string('nip',30);
            $table->string('alamat', 50);
            $table->string('email', 30);
            $table->string('no_ponsel', 13);
            $table->string('sekolah', 40);
            $table->string('agama', 40);
            $table->string('jenis_kelamin', 40);
            $table->unsignedBigInteger('pendaftaran_id');
            $table->foreign('pendaftaran_id')->references('id')->on('registrations');
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
        Schema::dropIfExists('members');
    }
}
