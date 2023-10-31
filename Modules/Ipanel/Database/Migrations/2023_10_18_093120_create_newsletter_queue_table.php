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
        Schema::create('newsletter_queue', function (Blueprint $table) {
            $table->increments("nqId",10);
            $table->string("nqPermalink");
            $table->integer("newsId");
            $table->integer("nsubId");
            $table->longText("nqBody");
            $table->string("nqEmail");
            $table->dateTime("nqSent");
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
        Schema::dropIfExists('newsletter_queue');
    }
};
