<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ConfigGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_group', function (Blueprint $table) {
             $table->engine = 'MyISAM';
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_unicode_ci';
            // CONTENT
            $table->bigIncrements('id')->nullable(false)->comment('');
			$table->string('name', 191)->nullable(false)->comment('名称');
			$table->boolean('sort')->nullable(false)->default(10)->comment('排序');
			$table->string('local', 10)->nullable()->default('backend')->comment('配置生效位置');
			$table->timestamp('updated_at')->comment('');
			$table->timestamp('created_at')->comment('');
			
        });

        DB::statement("alter table `config_group` comment '配置组表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_group');
    }
}
