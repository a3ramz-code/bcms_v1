<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = ['company_id','invoice_id','channel','sent_at','status','notes'];
}
