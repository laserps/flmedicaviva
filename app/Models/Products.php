<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";
    protected $primaryKey = "product_id";
    protected $fillable = ['created_at','updated_at'];
}
