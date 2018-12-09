<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribut', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->integer('strength');
            $table->integer('intelligence');
            $table->integer('resistance');
            $table->integer('speed');
            $table->integer('discretion');

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
        Schema::dropIfExists('attribut');
    }
}
