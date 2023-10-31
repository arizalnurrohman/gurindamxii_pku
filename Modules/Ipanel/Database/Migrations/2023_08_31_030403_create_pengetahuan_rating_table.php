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
        Schema::create('pengetahuan_rating', function (Blueprint $table) {
            # 	rtId 	id_user 	rtRate 	rtAddedDate 	
            $table->increments("rtId",10);
            $table->integer("id_user");
            #$table->foreign("id_user")->references('id')->on('users');
            #$table->integer("rtRate");
            $table->enum("rtRate", ['1','2','3','4','5']);
            $table->dateTime("rtAddedDate");
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
        Schema::dropIfExists('pengetahuan_rating');
    }
};
