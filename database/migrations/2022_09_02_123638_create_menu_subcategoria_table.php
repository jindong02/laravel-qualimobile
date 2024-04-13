<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuSubcategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_subcategoria', function (Blueprint $table) {
            $table->integer('menu_id')->unsigned();
            $table->integer('subcategoria_id');
            
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
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
        Schema::dropIfExists('menu_subcategoria');
    }
}
