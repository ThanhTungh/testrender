<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Faculty extends Model
{
    use HasFactory;

    public function coordinator(): BelongsTo
    {
        return $this->belongsTo(MarketingCoordinator::class, 'coordinator_id');
    }

    // Faculty vs Student: 1 faculty has many students
    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'faculty_id');
    }
}
