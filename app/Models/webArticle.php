<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class webArticle extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $fillable = ['title', 'content', 'image', 'user_id', 'category_id'];

    public function category(){
        return $this->belongsTo(webCategory::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
