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
        Schema::create('nhat_ky', function (Blueprint $table) {
            $table->id();
            $table->foreignId("ma_giao_vien")->constrained("users");
            $table->foreignId("ma_thiet_bi")->constrained("thiet_bi");
            $table->foreignId("ma_nhan_vien")->constrained("nhan_vien");
            $table->foreignId("ma_lop")->constrained("lop");
            $table->string("mo_ta_loi");
            $table->string("buoi");
            $table->timestamps();
            $table->string("ghi_chu");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhat_ky');
    }
};
