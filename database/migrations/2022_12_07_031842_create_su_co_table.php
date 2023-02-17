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
        Schema::create('su_co', function (Blueprint $table) {
            $table->id();
            $table->foreignId("ma_giao_vien")->constrained("users");
            $table->foreignId("ma_phong")->constrained("phong");
            $table->foreignId("ma_thiet_bi")->constrained("thiet_bi");
            $table->string("mo_ta_loi")->nullable();
            $table->string("trang_thai");
            $table->date('ngay');
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
        Schema::dropIfExists('su_co');
    }
};
