<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penerimaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permintaan_id')->constrained('permintaans')->onDelete('cascade');
            $table->integer('jumlah_diterima');
            $table->date('tanggal_penerimaan');
            $table->date('tanggal_kadaluarsa');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaans');
    }
};
