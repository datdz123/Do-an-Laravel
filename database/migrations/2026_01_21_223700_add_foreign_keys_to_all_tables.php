<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

/**
 * Migration để thêm foreign key constraints cho tất cả các bảng.
 * 
 * QUAN TRỌNG: Migration này KHÔNG xóa dữ liệu, chỉ:
 * 1. Thay đổi kiểu dữ liệu các cột foreign key từ INT sang BIGINT UNSIGNED
 * 2. Thêm foreign key constraints
 * 
 * Sử dụng Raw SQL để tránh phụ thuộc vào doctrine/dbal
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
        // ============================================
        // 1. BẢNG PRODUCTS
        // ============================================
        // Đổi kiểu dữ liệu product_category_id từ INT sang BIGINT UNSIGNED
        DB::statement('ALTER TABLE `products` MODIFY `product_category_id` BIGINT UNSIGNED NOT NULL');

        // Thêm foreign key
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('product_category_id')
                ->references('id')
                ->on('product_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        // ============================================
        // 2. BẢNG PRODUCT_COMMENTS
        // ============================================
        // Đổi kiểu dữ liệu
        DB::statement('ALTER TABLE `product_comments` MODIFY `product_id` BIGINT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE `product_comments` MODIFY `user_id` BIGINT UNSIGNED NULL');

        // Thêm foreign keys
        Schema::table('product_comments', function (Blueprint $table) {
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });

        // ============================================
        // 3. BẢNG ORDERS
        // ============================================
        // Đổi kiểu dữ liệu
        DB::statement('ALTER TABLE `orders` MODIFY `user_id` BIGINT UNSIGNED NULL');

        // Thêm foreign key
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });

        // ============================================
        // 4. BẢNG ORDER_DETAILS
        // ============================================
        // Đổi kiểu dữ liệu
        DB::statement('ALTER TABLE `order_details` MODIFY `order_id` BIGINT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE `order_details` MODIFY `product_id` BIGINT UNSIGNED NOT NULL');

        // Thêm foreign keys
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        // ============================================
        // 5. BẢNG BLOGS
        // ============================================
        // Đổi kiểu dữ liệu
        DB::statement('ALTER TABLE `blogs` MODIFY `user_id` BIGINT UNSIGNED NOT NULL');

        // Thêm foreign key
        Schema::table('blogs', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        // ============================================
        // 6. BẢNG BLOGS_COMMENTS
        // ============================================
        // Đổi kiểu dữ liệu
        DB::statement('ALTER TABLE `blogs_comments` MODIFY `blog_id` BIGINT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE `blogs_comments` MODIFY `user_id` BIGINT UNSIGNED NULL');

        // Thêm foreign keys
        Schema::table('blogs_comments', function (Blueprint $table) {
            $table->foreign('blog_id')
                ->references('id')
                ->on('blogs')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // ============================================
        // Xóa foreign keys (thứ tự ngược lại)
        // ============================================

        // 6. BLOGS_COMMENTS
        Schema::table('blogs_comments', function (Blueprint $table) {
            $table->dropForeign(['blog_id']);
            $table->dropForeign(['user_id']);
        });
        DB::statement('ALTER TABLE `blogs_comments` MODIFY `blog_id` INT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE `blogs_comments` MODIFY `user_id` INT UNSIGNED NULL');

        // 5. BLOGS
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        DB::statement('ALTER TABLE `blogs` MODIFY `user_id` INT UNSIGNED NOT NULL');

        // 4. ORDER_DETAILS
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['product_id']);
        });
        DB::statement('ALTER TABLE `order_details` MODIFY `order_id` INT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE `order_details` MODIFY `product_id` INT UNSIGNED NOT NULL');

        // 3. ORDERS
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        DB::statement('ALTER TABLE `orders` MODIFY `user_id` INT NULL');

        // 2. PRODUCT_COMMENTS
        Schema::table('product_comments', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['user_id']);
        });
        DB::statement('ALTER TABLE `product_comments` MODIFY `product_id` INT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE `product_comments` MODIFY `user_id` INT UNSIGNED NULL');

        // 1. PRODUCTS
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['product_category_id']);
        });
        DB::statement('ALTER TABLE `products` MODIFY `product_category_id` INT UNSIGNED NOT NULL');
    }
};
