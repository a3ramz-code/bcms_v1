<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['company_id','customer_code','name','email','phone','address','status'];
}
