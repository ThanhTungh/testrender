<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    // Student vs Faculty: 1 student has 1 faculty
    public function faculty(): HasOne
    {
        return $this->hasOne(Faculty::class, 'id', 'faculty_id');
    } 
}
