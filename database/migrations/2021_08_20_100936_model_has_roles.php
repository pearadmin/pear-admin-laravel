<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ModelHasRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_has_roles', function (Blueprint $table) {
             $table->engine = 'MyISAM';
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_unicode_ci';
            // CONTENT
            $table->unsignedInteger('role_id')->nullable(false)->comment('');
			$table->string('model_type', 191)->nullable(false)->comment('');
			$table->unsignedBigInteger('model_id')->nullable(false)->comment('');
			$table->primary(['role_id','model_id','model_type']);
			$table->index(['model_id','model_type'], 'model_has_roles_model_id_model_type_index');
			
        });

        DB::statement("alter table `model_has_roles` comment '用户-角色中间表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_has_roles');
    }
}
