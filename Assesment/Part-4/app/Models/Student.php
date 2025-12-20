<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = ['name', 'email', 'student_id'];
    protected $hidden = ['password'];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}