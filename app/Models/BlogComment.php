<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class BlogComment extends Model
{
    use HasFactory;


    protected $table = 'blogcomments';
    protected $fillable = [
        'name',
        'email',
        'comment',
        'blog_id',
    ];

    public function blogs(){
        return $this->belongsTo(Blog::class,'blog_id');
    }
}
