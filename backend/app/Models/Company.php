<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name','brand_name','primary_color','secondary_color','timezone'];
}
