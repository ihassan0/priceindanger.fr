<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coupon;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $fillable = ['title','image','description','status'];
    protected $primarykey = ['id'];


    public function coupons(){
        return $this->hasMany(Coupon::class);

    }
}
