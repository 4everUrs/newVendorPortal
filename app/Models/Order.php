<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'buyer_id'
    ];
    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }
    public function OrderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
}
