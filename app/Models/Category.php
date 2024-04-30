<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id', 'slug', 'is_active'];

    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }
    public function scopeChild($query)
    {
        return $query->whereNotNull('parent_id');
    }

    public function getStatus()
    {
        return  $this->status  == 0 ?  'غير مفعل'   : 'مفعل';
    }

    public function _parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    //get all childrens
    public function childrens()
    {
        return $this->hasMany(Self::class, 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_categories');
    }
}
