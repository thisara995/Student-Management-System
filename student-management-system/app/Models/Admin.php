<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'role', // Ensure role is fillable
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Role-based access logic (optional, for managing roles)
    public function isAdmin()
    {
        return $this->role === 'Admin';
    }

    public function isAssistant()
    {
        return $this->role === 'Assistant';
    }

     // Automatically hash the password when it's set
     public function setPasswordAttribute($password)
     {
         $this->attributes['password'] = Hash::make($password);
     }
}
