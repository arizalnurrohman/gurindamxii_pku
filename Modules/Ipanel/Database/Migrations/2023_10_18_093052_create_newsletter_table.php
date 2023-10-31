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
        Schema::create('newsletter', function (Blueprint $table) {
            $table->increments("newsId",10);
            $table->integer("pgId");
            $table->string("newsPermalink");
            $table->string("newsTitle");
            $table->string("newsURL");
            $table->string("newsImage");
            $table->longText("newsContent");
            $table->integer("newsCount");
            $table->integer("nwtId");
            $table->enum("newsGenerate", ['y','n']);
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
        Schema::dropIfExists('newsletter');
    }
};
