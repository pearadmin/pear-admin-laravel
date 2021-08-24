<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
             $table->engine = 'MyISAM';
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_unicode_ci';
            // CONTENT
            $table->bigIncrements('id')->nullable(false)->comment('');
			$table->integer('category')->nullable(false)->default(0)->comment('分类');
			$table->string('title', 200)->nullable(false)->comment('标题');
			$table->text('description')->nullable()->comment('描述');
			$table->text('content')->nullable(false)->comment('内容');
			$table->integer('click')->nullable(false)->default(0)->comment('点击量');
			$table->string('thumb', 200)->nullable()->default(null)->comment('封面图');
			$table->timestamp('created_at')->comment('');
			$table->timestamp('updated_at')->comment('');
			$table->timestamp('deleted_at')->comment('');
			
        });

        DB::statement("alter table `articles` comment '文章表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
