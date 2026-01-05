<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['company_id','invoice_id','paid_at','amount','method','reference'];
}
