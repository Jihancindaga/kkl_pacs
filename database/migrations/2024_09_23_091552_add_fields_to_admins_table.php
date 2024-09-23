<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('nama')->nullable(); // Kolom nama
            $table->string('jabatan')->nullable(); // Kolom jabatan
            $table->text('alamat')->nullable(); // Kolom alamat
            $table->string('no_telp')->nullable(); // Kolom no_telp
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable(); // Kolom jenis kelamin
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn(['nama', 'jabatan', 'alamat', 'no_telp', 'jenis_kelamin']);
        });
    }
}