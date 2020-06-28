<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('editors_id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('image');
            $table->string('description');
            $table->text('body');
            $table->string('type', 20)->default('draft');
            $table->string('status', 10)->default('pending');
            $table->string('reason')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('editors_id')->references('id')->on('editors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
