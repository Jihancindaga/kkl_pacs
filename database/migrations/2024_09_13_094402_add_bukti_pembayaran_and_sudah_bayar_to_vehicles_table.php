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
        $table->string('bukti_pembayaran')->nullable();  // Menyimpan path file bukti pembayaran
        $table->boolean('sudah_bayar')->default(false);  // Konfirmasi sudah bayar pajak
    });
}

public function down()
{
    Schema::table('vehicles', function (Blueprint $table) {
        $table->dropColumn(['bukti_pembayaran', 'sudah_bayar']);
    });
}

};
