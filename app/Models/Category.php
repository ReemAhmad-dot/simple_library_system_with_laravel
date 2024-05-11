<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public function books(){
        return $this->hasMany(Book::class);
    }
    public function mainCategory(){
        return $this->belongsTo(self::class,'parent_id');
    }
    public function subCategory(){
        return $this->hasMany(self::class,'parent_id','id');
    }
}
