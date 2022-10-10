<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostRequirement extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
