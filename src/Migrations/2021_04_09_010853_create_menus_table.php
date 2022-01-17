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
            $table->id();
            $table->string('title')->index();
            $table->string('url')->nullable();
            $table->enum('target', ['_blank','_self','_parent','_top'])->nullable();
            $table->integer('_lft')->nullable()->index();
            $table->integer('_rgt')->nullable()->index();
            $table->integer('parent_id')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['_lft', '_rgt']);
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
