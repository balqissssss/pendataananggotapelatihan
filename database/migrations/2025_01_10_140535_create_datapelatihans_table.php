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
        Schema::create('datapelatihans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pelatihan_id');
            $table->string('nama');
            $table->string('nik');
            $table->string('alamat');
            $table->string('no_hp');
            $table->timestamps();
        });
        Schema::table('datapelatihans', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

});
        Schema::table('datapelatihans', function (Blueprint $table) {
            $table->foreign('pelatihan_id')->references('id')->on('pelatihans')->onUpdate('cascade')->onDelete('cascade');

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datapelatihans');
    }
};
