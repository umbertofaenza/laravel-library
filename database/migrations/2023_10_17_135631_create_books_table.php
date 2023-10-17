<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 70);
            $table->string('author', 50);
            $table->string('isbn', 15);
            $table->string('editor', 30);
            $table->year('published_in');
            $table->smallInteger('pages_num')->unsigned();
            $table->boolean('lent');
            $table->date('lending_start');
            $table->date('lending_end');
            $table->string('cover');
            $table->tinyInteger('quantity')->unsigned();
            $table->enum('status', [1, 2, 3, 4, 5]);
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
        Schema::dropIfExists('books');
    }
};