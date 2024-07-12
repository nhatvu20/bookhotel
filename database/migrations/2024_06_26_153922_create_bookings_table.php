<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->integerIncrements('bookingid');
            $table->unsignedInteger('customerid')->nullable(false); //Kiểu số nguyên ko âm và khác null
                        // Khóa ở bảng này  -      //Khóa ở bảng kia (customerid)
            $table->foreign('customerid')->references('customerid')->on('Customers')->onDelete('cascade');  //Khóa ngoại
            $table->unsignedInteger('roomid')->nullable(false);
            $table->foreign('roomid')->references('roomid')->on('rooms')->onDelete('cascade');
            $table->date('checkindate');    //tạo kiểu date
            $table->date('checkoutdate');
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
        Schema::dropIfExists('bookings');
    }
}
