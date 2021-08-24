<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Messages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
             $table->engine = 'InnoDB';
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_unicode_ci';
            // CONTENT
            $table->bigIncrements('id')->nullable(false)->comment('');
			$table->string('name', 50)->nullable(false)->comment('留言人');
			$table->string('email', 100)->nullable(false)->comment('留言人邮箱');
			$table->string('phone', 50)->nullable(false)->comment('留言人电话');
			$table->text('album')->nullable()->comment('');
			$table->text('subject')->nullable(false)->comment('留言主题');
			$table->text('context')->nullable(false)->comment('留言内容');
			$table->integer('status')->nullable(false)->default(10)->comment('处理状态 10待处理 20已处理');
			$table->integer('flag')->nullable()->default(10)->comment('类型 10留言 20提醒 30通知');
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
        Schema::dropIfExists('messages');
    }
}
