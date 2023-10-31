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
        Schema::create('pengetahuan_activity', function (Blueprint $table) {
            $table->increments("paId",10);
            $table->integer("id_user");
            $table->enum("paType", ['','read', 'comment', 'like','pin']);
            $table->string("paIP")->nullable();
            $table->string("paModule")->nullable();
            $table->integer("refId");
            $table->timestamps();

            #READ
            #COMMENTS
            #LIKE
            #
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengetahuan_activity');
    }
};
