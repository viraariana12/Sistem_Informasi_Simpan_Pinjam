<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 30);
            $table->string('nip',30);
            $table->string('alamat', 50);
            $table->string('email', 30);
            $table->string('status', 30)->nullable();
            $table->string('no_ponsel', 13);
            $table->string('sekolah', 40);
            $table->string('agama', 40);
            $table->string('jenis_kelamin', 40);
            $table->string('ktp', 30);
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
        Schema::dropIfExists('registrations');
    }
}
