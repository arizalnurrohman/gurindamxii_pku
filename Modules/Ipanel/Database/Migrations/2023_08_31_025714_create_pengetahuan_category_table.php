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
        Schema::create('pengetahuan_category', function (Blueprint $table) {
            # 	catId 	catName 	catShort 	catPermalink 	catDescription 	catImage 	catStatus 	
            $table->increments("catId",10);
            $table->string("catName");
            $table->string("catShort",4);
            $table->string("catPermalink");
            $table->tinyText("catDescription");
            $table->string("catImage");
            $table->enum("catStatus", ['y', 'n']);
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
        Schema::dropIfExists('pengetahuan_category');
    }
};
