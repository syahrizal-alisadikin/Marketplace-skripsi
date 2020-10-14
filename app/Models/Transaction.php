<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'inscurence_price',
        'shiping_price',
        'total_price',
        'transaction_status',
        'code',
        'fk_user_id'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_id', 'id');
    }
}
