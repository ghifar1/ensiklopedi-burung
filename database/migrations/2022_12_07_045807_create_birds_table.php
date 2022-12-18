<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('endemic')->nullable();
            $table->string('location')->nullable();
            $table->string('habitat')->nullable();
            $table->string('status')->enum('endangered', 'vulnerable', 'near threatened', 'least concern', 'data deficient', 'extinct', 'extinct in the wild', 'not evaluated')->nullable();
            $table->unsignedBigInteger('bird_genus_id');
            $table->foreign('bird_genus_id')->references('id')->on('bird_genera')->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('is_deleted')->default(false);
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
        Schema::dropIfExists('birds');
    }
}
