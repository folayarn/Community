<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();;
            $table->foreignId('question_id')->constrained();
            $table->boolean('isFollowed')->default('0');
            $table->string('topic');
            $table->longText('body');
            $table->string('category');
            $table->date('creates');
            
            $table->string('question_provider');
            $table->boolean('isAnswered')->default(false);
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
        Schema::dropIfExists('follow_posts');
    }
}
