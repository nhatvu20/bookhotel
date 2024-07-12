<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->integerIncrements('roomid');
            $table->integer('roomnumber');  //kiểu roomnumber là int
            $table->enum('roomtype', ['standard','deluxe','suite']);    //giá trị mặc định roomtype là những cái trong []
            $table->enum('availability', ['available','occupied','under maintenance']);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
