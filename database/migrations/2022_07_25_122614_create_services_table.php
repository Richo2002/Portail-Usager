<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string("description");
            $table->foreignId('structure_id')->constrained();
            $table->foreignId('thematic_id')->constrained();
            $table->text("fileToProvide");
            $table->string('cost');
            $table->string('timeLimit');
            $table->text('text');
            $table->text("observation");
            $table->foreignId('user_id')->constrained();
            $table->boolean('actif');
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
        Schema::dropIfExists('services');
    }
};
