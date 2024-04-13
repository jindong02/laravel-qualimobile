<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_categoria', function (Blueprint $table) {
            $table->integer('menu_id')->unsigned();
            $table->integer('categoria_id');
            
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_categoria');
    }
}
