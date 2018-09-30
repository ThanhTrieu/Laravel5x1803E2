<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id')->unsigned(); // tu dong tang va khong am(tu 1 tro len)
            $table->string('username',60)->unique(); // khong trung
            $table->string('password',60);
            $table->tinyInteger('role')->default(-1); // gan gia tri mac dinh
            $table->tinyInteger('status')->default(1);
            $table->string('email',60)->unique(); // khong trung
            $table->string('phone',20)->nullable(); // cho phep rong 
            $table->string('address',200)->nullable(); // cho phep rong 
            $table->timestamps(); // 2 truong mac dinh la create time va update time - cho phep null (kieu datetime)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
