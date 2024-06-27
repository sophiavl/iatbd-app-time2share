<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'phone',
        'password',
        'address',
        'city',
        'registration_date',
        'is_admin',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function products(){
        return $this->hasMany(Product::class, 'owner_id');
    }

    public function isAdmin(){
        return $this->is_admin;
    }

    public function borrowedProducts() {
        return $this->belongsToMany(Product::class, 'user_product', 'user_id', 'product_id')->withTimestamps();
    }

    public function receivedReviews() {
        return $this->hasMany(Review::class, 'user_to_id');
    }
    
    public function givenReviews() {
        return $this->hasMany(Review::class, 'user_from_id');
    }
}
