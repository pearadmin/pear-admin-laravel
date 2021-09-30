<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Permissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
             $table->engine = 'MyISAM';
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_unicode_ci';
            // CONTENT
            $table->increments('id')->nullable(false)->comment('');
            $table->integer('_rgt')->unsigned()->comment('');
            $table->integer('_lft')->unsigned()->comment('');
            $table->integer('parent_id')->unsigned()->nullable()->comment('');
			$table->string('name', 191)->nullable(false)->comment('');
			$table->string('guard_name', 191)->nullable(false)->comment('');
			$table->string('display_name', 191)->nullable(false)->comment('');
			$table->string('route', 191)->nullable()->default(null)->comment('路由名称');
			$table->string('icon', 191)->nullable()->default(null)->comment('图标class');
			$table->integer('sort')->nullable(false)->default(0)->comment('排序');
			$table->integer('type')->nullable(false)->default(10)->comment('类型：10按钮，20菜单');
            $table->integer('status')->nullable(false)->default(10)->comment('状态 0禁用 10显示 20隐藏');

            $table->timestamp('created_at')->comment('');
			$table->timestamp('updated_at')->comment('');

        });

        DB::statement("alter table `permissions` comment '权限表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
