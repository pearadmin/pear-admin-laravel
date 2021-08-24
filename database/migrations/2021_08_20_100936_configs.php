<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Configs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
             $table->engine = 'MyISAM';
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_unicode_ci';
            // CONTENT
            $table->bigIncrements('id')->nullable(false)->comment('');
			$table->integer('group_id')->nullable(false)->default(0)->comment('组ID');
			$table->string('label', 191)->nullable(false)->comment('配置项名称');
			$table->string('key', 191)->nullable(false)->comment('配置项字段');
			$table->string('val', 191)->nullable()->default(null)->comment('配置项值');
			$table->string('type', 191)->nullable(false)->default('input')->comment('配置项类型，input输入框，radio单选，select下拉,image单图片');
			$table->text('content')->nullable()->comment('配置项类型的内容');
			$table->string('tips', 191)->nullable()->default(null)->comment('输入提示');
			$table->boolean('sort')->nullable(false)->default(10)->comment('排序');
			$table->timestamp('created_at')->comment('');
			$table->timestamp('updated_at')->comment('');
			
        });

        DB::statement("alter table `configs` comment '配置项表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
