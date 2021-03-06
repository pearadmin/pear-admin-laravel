<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Roles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
             $table->engine = 'MyISAM';
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_unicode_ci';
            // CONTENT
            $table->increments('id')->nullable(false)->comment('');
			$table->string('name', 191)->nullable(false)->comment('');
			$table->string('guard_name', 191)->nullable(false)->comment('');
			$table->string('display_name', 191)->nullable(false)->comment('');
            $table->integer('sort')->nullable(false)->default(999)->comment('排序');
            $table->integer('type')->nullable(false)->default(10)->comment('类型 10页面角色 20数据角色');
            $table->integer('status')->nullable(false)->default(10)->comment('状态 0禁用 10显示 20隐藏');
			$table->timestamp('created_at')->comment('');
			$table->timestamp('updated_at')->comment('');

        });

        DB::statement("alter table `roles` comment '角色表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
