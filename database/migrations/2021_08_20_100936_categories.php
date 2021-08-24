<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Categories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
             $table->engine = 'MyISAM';
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_unicode_ci';
            // CONTENT
            $table->bigIncrements('id')->nullable(false)->comment('');
			$table->string('name', 100)->nullable(false)->comment('名称');
			$table->integer('parent_id')->nullable(false)->default(0)->comment('父级ID');
			$table->integer('sort')->nullable(false)->default(10)->comment('排序');
			$table->integer('type')->nullable()->default(null)->comment('类型');
			$table->timestamp('updated_at')->comment('');
			$table->timestamp('created_at')->comment('');
			
        });

        DB::statement("alter table `categories` comment '分类表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
