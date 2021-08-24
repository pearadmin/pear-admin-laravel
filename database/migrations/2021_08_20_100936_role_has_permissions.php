<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class RoleHasPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_has_permissions', function (Blueprint $table) {
             $table->engine = 'MyISAM';
             $table->charset = 'utf8mb4';
             $table->collation = 'utf8mb4_unicode_ci';
            // CONTENT
            $table->unsignedInteger('permission_id')->nullable(false)->comment('');
			$table->unsignedInteger('role_id')->nullable(false)->comment('');
			$table->primary(['permission_id','role_id']);
			$table->index('role_id', 'role_has_permissions_role_id_foreign');
			
        });

        DB::statement("alter table `role_has_permissions` comment '角色-权限中间表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_has_permissions');
    }
}
