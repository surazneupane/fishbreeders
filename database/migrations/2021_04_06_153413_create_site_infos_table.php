<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_infos', function (Blueprint $table) {
            $table->id();
            $table->longText('banner')->nullable();
            $table->longText('logo')->nullable();
            $table->string('banner_text')->nullable();
            $table->longText('about_us')->nullable();
            $table->string('small_banner_text')->nullable();
            $table->longText('small_banner_description')->nullbale();
            $table->longText('small_banner')->nullable();
            $table->longText('footer_about')->nullable();


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
        Schema::dropIfExists('site_infos');
    }
}
