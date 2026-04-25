<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodOrder extends Model
{
    protected $fillable = [
        "good_id",
        "order_id"
    ];
}
