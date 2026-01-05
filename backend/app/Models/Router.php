<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Router extends Model
{
    protected $fillable = ['company_id','name','host','port','username','password_enc','status'];
}
