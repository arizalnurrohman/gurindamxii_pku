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
        Schema::create('hubungi_admin', function (Blueprint $table) {
            $table->increments("haId",10);
            $table->integer("id_user");
            $table->integer("haLockId");
            $table->string("haTicket")->nullable();
            $table->string("haTicketId")->nullable();
            $table->string("haTitle")->nullable();
            $table->string("haPermalink")->nullable();
            $table->text("haContent");
            $table->enum("haDisplay", ['y', 'n']);
            $table->integer("haParent");
            $table->enum("haRead", ['y', 'n']);
            $table->enum("haSession", ['open', 'close'])->nullable();
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
        Schema::dropIfExists('hubungi_admin');
    }
};
