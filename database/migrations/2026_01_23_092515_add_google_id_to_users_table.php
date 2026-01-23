<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

/**
 * Migration để thêm google_id và avatar cho đăng nhập Google OAuth.
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
        // Thêm cột google_id sau cột email
        DB::statement('ALTER TABLE `users` ADD COLUMN `google_id` VARCHAR(255) NULL AFTER `email`');

        // Thêm cột avatar sau cột google_id
        DB::statement('ALTER TABLE `users` ADD COLUMN `avatar` VARCHAR(255) NULL AFTER `google_id`');

        // Cho phép password có thể null (vì đăng nhập Google không cần password)
        DB::statement('ALTER TABLE `users` MODIFY `password` VARCHAR(255) NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Xóa cột google_id và avatar
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['google_id', 'avatar']);
        });

        // Đổi password về NOT NULL
        DB::statement('ALTER TABLE `users` MODIFY `password` VARCHAR(255) NOT NULL');
    }
};
