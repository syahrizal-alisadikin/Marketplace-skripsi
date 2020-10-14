<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['photos', 'fk_product_id'];
    protected $hidden = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'fk_product_id', 'id');
    }
}
