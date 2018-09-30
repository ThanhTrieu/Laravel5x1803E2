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
    // tao bang
    public function up()
    {
        // cho phep tao khoa ngoai
        Schema::enableForeignKeyConstraints();

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name',100);
            $table->integer('manuid')->unsigned();
            $table->integer('sysid')->unsigned();
            $table->integer('catid')->unsigned();
            $table->string('images',100);
            $table->float('price');
            $table->float('saleoff')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('qty');
            $table->text('description');
            $table->timestamps();

            // tao khoa ngoai
            // $table->foreign('manuid')
            //       ->references('id')->on('manufactures') 
            //       ->onDelete('cascade');

            // $table->foreign('sysid')
            //       ->references('id')->on('systems') 
            //       ->onDelete('cascade');

            // $table->foreign('catid')
            //       ->references('id')->on('categories') 
            //       ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // xoa bang
    public function down()
    {
        // huy bo khoa ngoai
        Schema::disableForeignKeyConstraints();
        // xoa bang du lieu
        Schema::dropIfExists('products');
    }
}
