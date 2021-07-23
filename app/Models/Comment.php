<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["fk_user_id","fk_product_id","comment"];


    public function user ()
    {
        return $this->belongsTo(User::class,'fk_user_id','id');
    }
}
