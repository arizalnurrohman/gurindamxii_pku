<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengetahuan_readlist', function (Blueprint $table) {
            $table->increments("rlId",10);
            $table->integer("id_user");
            $table->string("rlTitle");
            $table->string("rlPermalink");
            $table->tinyText("rlDescription");
            $table->timestamps();
        });
        #DI DALAM PENGETAHUAN READLIST AKAN ADA OTOMATIS 1 FIELD BERNAMA "Read_Later"
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengetahuan_readlist');
    }
};
