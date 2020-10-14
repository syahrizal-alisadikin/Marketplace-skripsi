<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'fk_transaction_id',
        'fk_product_id',
        'price',
        'shipping_status',
        'resi',
        'code'
    ];

    protected $hidden = [];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'fk_product_id');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'id', 'fk_transaction_id');
    }
}
