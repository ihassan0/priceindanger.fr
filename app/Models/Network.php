<?php

namespace App\Models;
use App\Models\Store;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;

    protected $table = 'networks';
    protected $primarykey = 'id';
    protected $fillable = ['name','affiliate_url'];




    public function stores(){
        return $this->hasMany(Store::class,'network_id');

    }
}


