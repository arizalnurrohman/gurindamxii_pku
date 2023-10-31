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
        Schema::create('ms_pembelajaran_detail', function (Blueprint $table) {
            $table->integer("pdId");
            $table->integer("pbId");
            $table->string("pdTitle");
            $table->string("pdPermalink");
            $table->string("pdImage");
            $table->string("pdFile");
            $table->string("pdVideo");
            $table->longText("pdDescription");
            $table->integer("pdDuration");
            $table->enum("pdStatus", ['y', 'n']);
            $table->integer("pdSort");
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
        Schema::dropIfExists('ms_pembelajaran_detail');
    }
};
