<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('fk_tale_id')->nullable(false);
            $table->string('title')->nullable(false);
            $table->string('fileUrl')->nullable(false);
            $table->string('type')->nullable(false);
            $table->boolean('is_enabled')->nullable(false);
            $table->text('size')->nullable(false);
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
