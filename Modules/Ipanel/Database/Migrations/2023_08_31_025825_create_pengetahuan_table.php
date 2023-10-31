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
        Schema::create('pengetahuan', function (Blueprint $table) {
            #pgId 	catId 	pgType 	pgTitle 	pgPermalink 	pgTimePost 	pgImage 	pgDescription 	pgViewed 	pgReported 	id_user 	pgDisplay 	
            $table->increments("pgId",10);
            $table->integer("id_user");
            #$table->foreign("id_user")->references('id')->on('users');
            $table->integer("catId");
            #$table->foreign("catId")->references('catId')->on('pengetahuan_category');
            $table->enum("pgType", ['Public', 'Private']);
            $table->string("pgTitle");
            $table->string("pgPermalink");
            $table->dateTime("pgTimePost");
            $table->string("pgImage")->nullable();
            $table->tinyText("pgDescription");
            $table->integer("pgEstimation");
            $table->integer("pgViewed");
            $table->enum("pgDisplay", ['y', 'n']);
            $table->enum("pgReported", ['y', 'n']);
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
        Schema::dropIfExists('pengetahuan');
    }
};
