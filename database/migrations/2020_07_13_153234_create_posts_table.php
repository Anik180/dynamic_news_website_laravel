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
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('division_id');
            $table->integer('district_id')->nullable();
            $table->integer('user_id');
            $table->string('title_bn');
            $table->string('title_en');
            $table->string('image');
            $table->string('image_caption')->nullable();
            $table->text('detail_bn');
            $table->text('detail_en')->nullable();
            $table->integer('headline')->nullable();
            $table->integer('big_thumbnail')->nullable();
            $table->integer('first_section')->nullable();
            $table->integer('second_section')->nullable();
            $table->integer('second_section_thumbnail')->nullable();
            $table->integer('second_section-big_thumbnail')->nullable();
            $table->integer('second_section-small_thumbnail')->nullable();
            $table->string('post_date')->nullable();
            $table->string('post_month')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
