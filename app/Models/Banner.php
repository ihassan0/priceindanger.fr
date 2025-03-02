<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';
    protected $fillable = [

        'banner',
        'store_id',
        'link',
        'status',
        'is_main'
    ];

    public function store(){
        return $this->belongsTo(Store::class,'store_id');
    }
}
