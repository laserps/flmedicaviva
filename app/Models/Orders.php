<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $primaryKey = 'order_id';
    protected $table = "orders";
    protected $fillable = ['created_at','updated_at'];
}
