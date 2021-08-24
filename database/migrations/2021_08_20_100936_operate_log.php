<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class OperateLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operate_log', function (Blueprint $table) {
             $table->engine = 'MyISAM';
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_unicode_ci';
            // CONTENT
            $table->bigIncrements('id')->nullable(false)->comment('');
			$table->integer('user_id')->nullable(false)->comment('操作用户ID');
			$table->string('uri', 191)->nullable(false)->comment('操作地址');
			$table->string('parameter', 191)->nullable()->default(null)->comment('参数');
			$table->string('method', 191)->nullable(false)->comment('请求方式：GET、POST、PUT、DELETE、HEAD');
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
        Schema::dropIfExists('operate_log');
    }
}
