<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thiet_bi', function (Blueprint $table) {
            $table->id();
            $table->foreignId("ma_phong")->constrained("phong");
            $table->foreignId("ma_loai_thiet_bi")->constrained("loai_thiet_bi");
            $table->string('ten_thiet_bi');
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
        Schema::dropIfExists('thiet_bi');
    }
};
