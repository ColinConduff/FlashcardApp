<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlashcardsTable extends Migration
{
    /**
     * Creates the flashcards table with the columns id, deck_id, front, 
     * back, number of attempts, number correct, ratio correct
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flashcards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('deck_id')->unsigned();
            $table->text('front');
            $table->text('back');
            $table->integer('number_of_attempts');
            $table->integer('number_correct');
            $table->decimal('ratio_correct', 2, 2);
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
        Schema::drop('flashcards');
    }
}
