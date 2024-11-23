<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coupon;
use App\Models\Store;


class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable =[
        'name',
        'meta_desc',
        'meta_title'

];


    public function coupons(){
        return $this->hasMany(Coupon::class,'category_id', 'id');
    }
    public function stores(){
        return $this->belongsToMany(Store::class);
    }
}


