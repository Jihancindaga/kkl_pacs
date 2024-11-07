<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUniqueConstraintFromPlatInVehiclesTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            // Menghapus constraint unique
            $table->dropUnique(['plat']); // Pastikan ini sesuai dengan nama kolom yang ingin diubah
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}