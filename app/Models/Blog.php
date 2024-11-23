<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogComment;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $primarykey = 'id';
    protected $fillable = ['title','image','description','meta_desc','writter'];


    public function comments(){
        return $this->hasMany(BlogComment::class,'blog_id');
    }
}
