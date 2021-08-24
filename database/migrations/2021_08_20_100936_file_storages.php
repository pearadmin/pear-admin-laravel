<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class FileStorages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_storages', function (Blueprint $table) {
             $table->engine = 'InnoDB';
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_unicode_ci';
            // CONTENT
            $table->bigIncrements('id')->nullable(false)->comment('');
			$table->unsignedInteger('app_id')->nullable(false)->comment('模块ID');
			$table->string('app_type', 512)->nullable(false)->comment('模型');
			$table->string('base_url', 1000)->nullable(false)->comment('域名/');
			$table->string('link', 1000)->nullable(false)->comment('完整访问路径');
			$table->string('path', 1000)->nullable(false)->comment('访问路径');
			$table->string('type', 120)->nullable()->default(null)->comment('文件类型：image/jpeg等');
			$table->integer('size')->nullable()->default(null)->comment('KB大小');
			$table->string('name', 1000)->nullable(false)->default('')->comment('客户端文件名');
			$table->string('original_name', 512)->nullable(false)->comment('文件原名');
			$table->string('upload_ip', 45)->nullable()->default(null)->comment('上传客户端IP');
			$table->string('hash', 32)->nullable()->default(null)->comment('文件哈希');
			$table->boolean('status')->nullable(false)->default(10)->comment('状态：0关闭；10公开；20私有');
			$table->timestamp('created_at')->comment('');
			$table->timestamp('updated_at')->comment('');
			$table->timestamp('deleted_at')->comment('');
			$table->index('app_id', 'file_storages_app_id_index');
			
        });

        DB::statement("alter table `file_storages` comment '公共文件表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_storages');
    }
}
