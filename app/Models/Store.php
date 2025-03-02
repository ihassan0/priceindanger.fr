<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coupon;
use App\Models\Network;
use App\Models\Category;
class Store extends Model
{
    use HasFactory;
    protected $table = 'stores';

    protected $fillable =['id','name','url','meta_title','meta_desc',
    'network_id','category_id','logo','description',
    'about_middle','how_to_use_coupon','Added_by'];
    protected $primarykey ='id';
   
    public function coupons(){
        return $this->hasMany(Coupon::class,'store_id');
    }

    public function networks(){

        return $this->belongsTo(Network::class,'network_id');
    }

    public function categories(){

        return $this->belongsToMany(Category::class);
    }
   
}
