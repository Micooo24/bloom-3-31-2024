<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;


class User extends Authenticatable   implements MustVerifyEmail
{
   
    // Notifiable, MustVerifyEmailTrait
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

     // Define the one-to-one relationship between User and Cart
     public function cart()
     {
         return $this->hasOne(Cart::class);
     }

     protected static function boot()
    {
        parent::boot();

        // Event listener for the "created" event
        static::created(function ($user) {
            // Create a new cart for the newly created user
            $user->cart()->create();
        });
    }
}
