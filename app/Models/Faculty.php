<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faculty extends Model
{
    use HasFactory;

    public function coordinator(): BelongsTo
    {
        return $this->belongsTo(MarketingCoordinator::class, 'coordinator_id');
    }
}
