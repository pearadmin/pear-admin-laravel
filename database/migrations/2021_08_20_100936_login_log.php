<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class LoginLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_log', function (Blueprint $table) {
             $table->engine = 'MyISAM';
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_unicode_ci';
            // CONTENT
            $table->bigIncrements('id')->nullable(false)->comment('');
			$table->string('username', 191)->nullable(false)->comment('登录用户名');
			$table->string('ip', 45)->nullable(false)->comment('登录IP地址');
			$table->string('method', 191)->nullable(false)->comment('请求方式');
			$table->string('user_agent', 191)->nullable(false)->comment('UserAgent');
			$table->string('remark', 191)->nullable()->default(null)->comment('备注');
			$table->timestamp('created_at')->comment('');
			$table->timestamp('updated_at')->comment('');
			
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login_log');
    }
}
