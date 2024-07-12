<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $primaryKey = "customerid";
    public $timestamps = false;

    protected $fillable = [
        'customerid',
        'name',
        'email',
        'phone',
    ];
    public function booking() {
        return $this->hasMany(Bookings::class,'customerid','customerid');
    }
}
