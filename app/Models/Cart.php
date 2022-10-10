<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'vendor_shop_id', 'qty', 'subtotal'
    ];
    public function VendorShop()
    {
        return $this->belongsTo(VendorShop::class);
    }
}
