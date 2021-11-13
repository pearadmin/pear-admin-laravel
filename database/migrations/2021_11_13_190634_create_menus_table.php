<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('p_id')->default(0);
            $table->string('title');
            $table->string('icon')->nullable();
            $table->unsignedTinyInteger('type');
            $table->string('href')->nullable();
            $table->string('open_type')->nullable();
            $table->unsignedInteger('sort')->default(0);
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('updater_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
