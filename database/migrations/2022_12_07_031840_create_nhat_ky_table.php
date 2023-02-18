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
            $table->foreignId("ma_phong")->constrained("phong");
            // $table->foreignId("ma_lop")->constrained("lop");
            $table->string("ma_lop");
            $table->string("mo_ta_loi")->nullable();
            $table->string("buoi");
            $table->string("trang_thai");
            $table->date('ngay');
            $table->string("ghi_chu");
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
        Schema::dropIfExists('nhat_ky');
    }
};