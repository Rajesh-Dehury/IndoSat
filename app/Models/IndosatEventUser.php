<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IndosatEventUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'indosat_event_user';

    function event(): BelongsTo
    {
        return $this->belongsTo(IndonesiaEvent::class, 'event_id', 'id');
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(IndosatUser::class, 'indosat_user_id', 'id');
    }
}
