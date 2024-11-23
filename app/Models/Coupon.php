<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Store;
use App\Models\Event;

class Coupon extends Model
{
    use HasFactory;
    protected $table ='coupon';
    protected $primaryKey = 'id';
    protected $fillable =['name','redirect_url','code',
   'discount', 'category_id','start_date','expire_date','status','description','position','event_id','store_id','popular_coupons','exclusive_coupons'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function store(){
        return $this->belongsTo(Store::class,'store_id');
    }
    public function event(){
        return $this->belongsTo(Event::class,'event_id');
    }
}
