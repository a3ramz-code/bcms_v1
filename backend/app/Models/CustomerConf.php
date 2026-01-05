<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerConf extends Model
{
    protected $table = 'customer_conf';
    protected $fillable = ['customer_id','pppoe_username','pppoe_password','ip_address','notes'];
}
