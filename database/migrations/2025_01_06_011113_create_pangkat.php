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
        Schema::create('pangkats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('periode');
            $table->string('pangkat_lama');
            $table->string('pangkat_baru');
            $table->string('jabatan');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pangkats');
    }
    
};
