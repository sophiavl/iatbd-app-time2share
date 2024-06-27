<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category', 'description', 'deadline', 'photo', 'owner_id'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function borrowers() {
        return $this->belongsToMany(User::class, 'user_product', 'product_id', 'user_id')->withTimestamps();
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }
    
    
    
}
