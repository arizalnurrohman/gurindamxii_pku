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
        Schema::create('pengetahuan_comment', function (Blueprint $table) {
            # 	cmId 	pgId 	id_user 	cmParent 	cmComment 	cmAddedDate 	cmDisplay 	cmSort 	
            $table->increments("cmId",10);
            $table->string("cmPermalink");
            $table->integer("pgId");
            #$table->foreign('pgId')->references('pgId')->on('pengetahuan');
            $table->integer("id_user");
            #$table->foreign("id_user")->references('id')->on('users');
            $table->integer("cmParent");
            $table->tinyText("cmComment");
            $table->dateTime("cmAddedDate");
            $table->enum("cmDisplay", ['y', 'n']);
            $table->integer("cmSort");
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
        Schema::dropIfExists('pengetahuan_comment');
    }
};
