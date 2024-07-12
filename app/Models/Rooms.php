<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    protected $primaryKey = "roomid";
    public $timestamps = false;
    protected $fillable = [
        'roomid',
        'roomnumber',
        'roomtype',
        'availability',
    ];

    public function booking() {
        return $this->hasMany(Bookings::class,'roomid','roomid');
    }
}
