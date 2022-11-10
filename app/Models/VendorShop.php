<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorShop extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'item_name', 'condition', 'description', 'amount', 'file_name', 'status', 'origin'
    ];
    public function image()
    {
        return $this->hasMany('App\Models\Image');
    }
    public function OrderItem()
    {
        return $this->belongsTo(VendorShop::class);
    }
}
