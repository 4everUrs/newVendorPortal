<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;
    protected $fillable = [
        'recipient', 'email', 'phone', 'address', 'status', 'payment_method', 'user_id', 'order_id'
    ];
}
