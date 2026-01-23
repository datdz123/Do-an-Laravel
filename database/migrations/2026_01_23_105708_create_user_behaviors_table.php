<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration tạo bảng user_behaviors để lưu hành vi người dùng
 * Phục vụ cho hệ thống gợi ý sản phẩm bằng Collaborative Filtering
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_behaviors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Có thể null cho guest
            $table->unsignedBigInteger('product_id');
            $table->string('session_id')->nullable(); // Track guest users
            $table->enum('action_type', ['view', 'cart', 'purchase', 'rating'])->default('view');
            $table->decimal('score', 3, 1)->default(1.0); // Weight của hành vi (view=1, cart=3, purchase=5, rating=rating_value)
            $table->timestamps();

            // Indexes cho query performance
            $table->index('user_id');
            $table->index('product_id');
            $table->index('session_id');
            $table->index('action_type');
            $table->index(['user_id', 'product_id', 'action_type']);

            // Foreign keys
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_behaviors');
    }
};
