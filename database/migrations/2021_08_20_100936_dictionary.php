<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Dictionary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary', function (Blueprint $table) {
             $table->engine = 'MyISAM';
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_unicode_ci';
            // CONTENT
            $table->bigIncrements('id')->nullable(false)->comment('');
			$table->string('name', 100)->nullable(false)->comment('名称');
			$table->integer('parent_id')->nullable(false)->default(0)->comment('父级ID');
			$table->integer('sort')->nullable(false)->default(10)->comment('排序');
			$table->boolean('disable')->nullable()->default(2)->comment('是否删除1：是2：否');
			$table->string('code', 50)->nullable()->default(null)->comment('代码');
			$table->text('desc')->nullable()->comment('');
			$table->timestamp('created_at')->comment('');
			$table->timestamp('updated_at')->comment('');
			
        });

        DB::statement("alter table `dictionary` comment '字典表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dictionary');
    }
}
