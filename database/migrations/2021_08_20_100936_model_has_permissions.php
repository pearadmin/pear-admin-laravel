<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ModelHasPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_has_permissions', function (Blueprint $table) {
             $table->engine = 'MyISAM';
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_unicode_ci';
            // CONTENT
            $table->unsignedInteger('permission_id')->nullable(false)->comment('');
			$table->string('model_type', 191)->nullable(false)->comment('');
			$table->unsignedBigInteger('model_id')->nullable(false)->comment('');
			$table->primary(['permission_id','model_id','model_type']);
			$table->index(['model_id','model_type'], 'model_has_permissions_model_id_model_type_index');
			
        });

        DB::statement("alter table `model_has_permissions` comment '用户-权限中间表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_has_permissions');
    }
}
