<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('kode_kendaraan')->nullable()->change(); // Ubah kolom menjadi nullable
        });
    }
    
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('kode_kendaraan')->nullable(false)->change(); // Kembalikan ke not null
        });
    }
    
};
