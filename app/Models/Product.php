<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'price', 'description', 'status', 'specifications'];
    protected $guarded = [];


    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getStatus()
    {
        return $this->status == 0 ? 'غير مفعل' : 'مفعل';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories');
    }
}
