<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use App\Models\ProductGallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'fk_user_id', 'fk_categories_id', 'price', 'description', 'slug'];

    protected $hidden = [];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'fk_product_id', 'id');
        // return $this->hasMany(ProductGallery::class, 'fk_product_id', 'id')->withTrashed();

    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'fk_user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'fk_categories_id', 'id');
    }
}
