<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Profile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_Id',
        'username',
        'Description',
        'gender'

    ];
    
    public function user()
        {
            return $this->belongsTo(User::class);
        }
}
