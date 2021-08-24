<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
             $table->engine = 'MyISAM';
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_unicode_ci';
            // CONTENT
            $table->increments('id')->nullable(false)->comment('');
			$table->string('username', 191)->nullable(false)->comment('用户名');
			$table->string('phone', 191)->nullable(false)->comment('手机号码');
			$table->string('nickname', 191)->nullable()->default(null)->comment('昵称');
			$table->string('email', 191)->nullable(false)->comment('邮箱');
			$table->string('password', 191)->nullable(false)->comment('密码');
			$table->string('remember_token', 100)->nullable()->default(null)->comment('');
			$table->string('api_token', 80)->nullable()->default(null)->comment('');
			$table->timestamp('created_at')->comment('');
			$table->timestamp('updated_at')->comment('');
			$table->unique('phone', 'users_phone_unique');
			$table->unique('api_token', 'users_api_token_unique');
			$table->unique('username', 'users_username_unique');
			$table->unique('email', 'users_email_unique');
			
        });

        DB::statement("alter table `users` comment '用户表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
