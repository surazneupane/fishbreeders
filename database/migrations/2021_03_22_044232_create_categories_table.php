<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->boolean('status')->default(false);
            $table->integer('order')->nullable();
            $table->boolean('show_in_header')->default(false);
            $table->boolean('show_in_footer')->default(false);
            $table->longText('post_content')->nullable();
            $table->integer('parent_id')->default(0);
            $table->timestamps();
            $table->date('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('categories');
    }
}
