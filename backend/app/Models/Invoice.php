<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['company_id','customer_id','invoice_no','period','amount','status','due_date'];
}
