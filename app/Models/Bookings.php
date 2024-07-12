<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $primaryKey = "bookingid";
    public $timestamps = false; //Bỏ trường update_at và create_at

    protected $fillable = [
        'bookingid',
        'customerid',
        'roomid',
        'checkindate',
        'checkoutdate',
    ];

    public function rooms() {
        return $this->belongsTo(Rooms::class,'roomid','roomid');
    }
    public function customers() {
        return $this->belongsTo(Customers::class,'customerid','customerid');
    }
}
