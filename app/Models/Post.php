<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];
    
    public function user()
        {
            return $this->belongsTo(User::class);
        }
        
    public function reviews()   
        {
            return $this->hasMany(Review::class);  
        }
}