<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = "payments";
    protected $fillable = ['created_at','updated_at'];
}