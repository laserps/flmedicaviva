<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    protected $table = "bank";
    protected $fillable = ['created_at','updated_at'];
}
