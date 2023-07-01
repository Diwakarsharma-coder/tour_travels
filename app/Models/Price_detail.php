<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price_detail extends Model
{
    use HasFactory;

    protected $table  = "price_details";

    protected $fillable = [
        'product_id',
        'price_title',
        'price_value',
        'price_desc',
    ];
   
}
