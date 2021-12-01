<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tales', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->text('body')->nullable(false);
            $table->boolean('is_enabled')->nullable(false);
            $table->dateTime('created_at')->nullable(false);
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tales');
    }
}
