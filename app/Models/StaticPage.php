<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    protected $table = "staticpage";
    protected $fillable = ['created_at','updated_at'];
}
