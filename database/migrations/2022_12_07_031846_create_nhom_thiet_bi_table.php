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
        Schema::create('nhom_thiet_bi', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId("ma_nhat_ky")->constrained("nhat_ky");
            $table->foreignId("ma_thiet_bi")->constrained("thiet_bi");
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
        Schema::dropIfExists('nhom_thiet_bi');
    }
};
