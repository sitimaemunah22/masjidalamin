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
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id('id_pengeluaran');
            // $table->unsignedBigInteger('kode_pengeluaran')->nullable(false);
            $table->unsignedBigInteger('id_jenis')->nullable();
            $table->unsignedBigInteger('id_donatur')->nullable();
            $table->integer('jumlah_pengeluaran')->nullable(false);
            $table->dateTime('tanggal_pengeluaran')->default('2023-01-01 00:00:00')->nullable(false);
            $table->text('upload')->nullable(true);
            $table->timestamps();

            $table->foreign('id_jenis')->on('jenis')->references('id_jenis')->nullOnDelete();
            $table->foreign('id_donatur')->on('donaturs')->references('id_donatur')->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
