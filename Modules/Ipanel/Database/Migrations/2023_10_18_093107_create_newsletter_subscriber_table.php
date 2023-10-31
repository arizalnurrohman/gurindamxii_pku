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
        Schema::create('newsletter_subscriber', function (Blueprint $table) {
            $table->increments("nsubId",10);
            $table->string("nsubPermalink");
            $table->string("nsubEmail");
            $table->enum("nsubStatus", ['y','n']);
            $table->dateTime("nsubSubsribe");
            $table->dateTime("nsubUnSubsribe");
            $table->integer("id_user")->nullable();
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
        Schema::dropIfExists('newsletter_subscriber');
    }
};
