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
        Schema::create('newsletter_template', function (Blueprint $table) {
            $table->increments("nwtId",10);
            $table->longText("nwtTemplate");
            $table->text("nwtNote");
            $table->enum("nwtStatus", ['active','nonactive']);
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
        Schema::dropIfExists('newsletter_template');
    }
};
