<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['senderName','senderPhone', 'product','destination_id', 'receiverName', 'receiverPhone'];
}
