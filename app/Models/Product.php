<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category', 'description', 'deadline'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    
}
