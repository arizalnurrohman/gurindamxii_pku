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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->increments("cuId",10);
            $table->string("cuTitle");
            $table->string("cuPermalink");
            $table->integer("cuParent");
            $table->string("cuName");
            $table->string("cuHP");
            $table->string("cuEmail");
            $table->enum("cuType", ['Kritik', 'Saran']);
            $table->text("cuMessage");
            $table->integer("id_user");
            $table->enum("cuRead", ['unread','read']);
            $table->timestamps();
            /*
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
            $table->enum("pgReported", ['y', 'n']);*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_us');
    }
};
