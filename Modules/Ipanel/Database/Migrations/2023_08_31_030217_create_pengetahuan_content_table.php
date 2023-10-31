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
        Schema::create('pengetahuan_content', function (Blueprint $table) {
            #pcId 	pgId 	pcContentType 	pcText 	pcUrl 	pcDocuments 	pcSort 	
            $table->increments("pcId",10);
            $table->integer("pgId");
            #$table->foreign('pgId')->references('pgId')->on('pengetahuan');
            $table->string("pcTitle")->nullable();
            $table->string("pcPermalink")->nullable();
            $table->enum("pcContentType", ['text', 'document','video']);
            $table->longText("pcText")->nullable();
            $table->string("pcVideo")->nullable();
            $table->string("pcDocuments")->nullable();
            $table->integer("pcDuration");
            $table->integer("pcSort");
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
        Schema::dropIfExists('pengetahuan_content');
    }
};
