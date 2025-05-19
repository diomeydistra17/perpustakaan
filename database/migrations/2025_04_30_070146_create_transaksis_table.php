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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idanggota');
            $table->unsignedBigInteger('idbuku');
            $table->date('tglpinjam')->nullable();
            $table->date('tglkembali')->nullable();
            // $table->string('status')->default('Dipinjam');
            $table->timestamps();
            $table->softDeletes();
        
            $table->foreign('idanggota')->references('id')->on('anggotas')
                  ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('idbuku')->references('id')->on('bukus')
                  ->onDelete('restrict')->onUpdate('cascade');
        });        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
