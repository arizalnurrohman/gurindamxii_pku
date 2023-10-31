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
        Schema::create('pengetahuan_highlight', function (Blueprint $table) {
            # 	hlId 	pgId 	hlMonth 	hlYear 	hlStart 	hlEnd 	
            $table->increments("hlId",10);
            $table->integer("pgId");
            #$table->foreign("pgId")->references('pgId')->on('pengetahuan');
            $table->tinyInteger("hlMonth");
            $table->integer("hlYear");
            $table->dateTime("hlStart");
            $table->dateTime("hlEnd");
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
        Schema::dropIfExists('pengetahuan_highlight');
    }
};
