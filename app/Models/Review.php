<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_from_id',
        'user_to_id',
        'rating',
        'comment',
    ];

    public function userFrom() {
        return $this->belongsTo(User::class, 'user_from_id');
    }
    
    public function userTo() {
        return $this->belongsTo(User::class, 'user_to_id');
    }
    
}
