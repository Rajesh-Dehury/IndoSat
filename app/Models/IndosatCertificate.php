<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IndosatCertificate extends Model
{
    use HasFactory;
    protected $table = 'indosat_certificate';

    function user(): BelongsTo
    {
        return $this->belongsTo(IndosatUser::class, 'user_id', 'id');
    }
    function event(): BelongsTo
    {
        return $this->belongsTo(IndonesiaEvent::class, 'event_id', 'id');
    }
}
