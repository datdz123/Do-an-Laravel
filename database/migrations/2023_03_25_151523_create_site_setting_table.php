<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_setting', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('site_title')->nullable();
            $table->string('site_keywords')->nullable();
            $table->string('site_icon')->nullable();
            $table->string('site_email')->unique();
            $table->string('site_phone')->nullable();
            $table->string('site_address')->nullable();
            $table->string('site_link_facebook')->nullable();
            $table->string('site_link_youtube')->nullable();
            $table->string('site_link_instagram')->nullable();
            $table->string('site_description')->nullable();
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
        Schema::dropIfExists('site_setting_posts');
    }
};
