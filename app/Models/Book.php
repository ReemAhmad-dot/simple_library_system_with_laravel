<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'user_id',
        'category_id'
    ];

    public function user(){
        return $this->belongsTo(User::class); 
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function usersThatLiked(){
        return $this->belongsToMany(User::class,'favorites');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

}
