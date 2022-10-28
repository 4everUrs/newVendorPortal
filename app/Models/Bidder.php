<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidder extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'phone', 'bid_amount', 'bid_proposal_file', 'status', 'address', 'post_id', 'user_id'
    ];
}
