<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MarketingCoordinator extends Model
{
    use HasFactory;

    // Coordinator vs Faculty: 1 coordinator has 1 faculty
    public function faculty(): HasOne
    {
        return $this->hasOne(Faculty::class, 'coordinator_id');
    }
}
