<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            // 2.1 Create the Product table fields:
                $table->string('name');
                $table->text('detail');
                $table->double('price');
                $table->integer('stock');
                $table->double('discount');
            // 22.1 Connect the user table with Product:
                $table->bigInteger('user_id')
                      ->unsigned()->index();
                $table->foreign('user_id')
                      ->references('id')->on('users')
                      ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('products');
    }
}
