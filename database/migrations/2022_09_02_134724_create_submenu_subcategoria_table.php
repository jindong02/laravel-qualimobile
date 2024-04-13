<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmenuSubcategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submenu_subcategoria', function (Blueprint $table) {
            $table->integer('submenu_id')->unsigned();
            $table->integer('subcategoria_id');
            
            $table->foreign('submenu_id')->references('id')->on('submenus')->onDelete('cascade');
            $table->foreign('subcategoria_id')->references('id')->on('subcategoria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submenu_subcategoria');
    }
}
