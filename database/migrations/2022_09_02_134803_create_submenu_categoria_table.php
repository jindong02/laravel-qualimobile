<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmenuCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submenu_categoria', function (Blueprint $table) {
            $table->integer('submenu_id')->unsigned();
            $table->integer('categoria_id');
            
            $table->foreign('submenu_id')->references('id')->on('submenus')->onDelete('cascade');
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
        Schema::dropIfExists('submenu_categoria');
    }
}
