<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = "review_table";

    protected $fillable = [
        'product_id',
        'user_name',
        'user_rating',
        'user_review',
        'email',
        'image',
        'date_time',
        
    ];
}
