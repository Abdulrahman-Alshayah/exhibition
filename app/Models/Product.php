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
}
