<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'name',
        'age',
        'address',
        'mobile'
    ];

    // Define any relationships
    public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }
}
