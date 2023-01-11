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
        Schema::create('phong', function (Blueprint $table) {
            $table->id();
            $table->foreignId("ma_nhom_phong")->constrained("nhom_phong");
            $table->foreignId("ma_loai_phong")->constrained("loai_phong");
            $table->string('ten_phong');
            $table->string('so_do_bo_tri');
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
        Schema::dropIfExists('phong');
    }
};
