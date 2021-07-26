<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['fk_product_id', 'fk_user_id','quantity'];

    protected $hidden = [];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'fk_product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_id', 'id');
    }
}
