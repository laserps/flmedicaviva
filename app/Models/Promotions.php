<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    protected $table = "promotion";
    protected $fillable = ['created_at','updated_at'];
}