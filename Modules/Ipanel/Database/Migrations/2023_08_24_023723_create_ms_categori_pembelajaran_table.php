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
        Schema::create('ms_pembelajaran_categori', function (Blueprint $table) {
            $table->integer("catId");
            $table->string("catName");
            $table->string("catPermalink");
            $table->string("catImage");
            $table->tinyText("catDescription");
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
        Schema::dropIfExists('ms_pembelajaran_categori');
    }
};
