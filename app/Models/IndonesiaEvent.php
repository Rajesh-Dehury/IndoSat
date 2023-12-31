<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IndonesiaEvent extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function webinarCategory(): BelongsTo
    {
        return $this->belongsTo(WebinarCategory::class, 'webinar_category_id', 'id');
    }
}
