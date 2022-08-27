<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class webCategory extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'user_id'];

    public function article(){
        return $this->hasMany(webArticle::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
