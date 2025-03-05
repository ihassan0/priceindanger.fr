<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSettings extends Model
{
    use HasFactory;

    protected $table ='homesettings';
    protected $primarykey ='id';
    protected $fillable = ['description',
                            'about_us',
                            'contact_us',
                            'privacy_policy',
                            'FAQ',
                            'navbar_image'
];
}
