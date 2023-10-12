<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IndosatUsersUsedCredit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'indosat_users_used_credit';

    function user(): BelongsTo
    {
        return $this->belongsTo(IndosatUser::class, 'user_id', 'id');
    }

    public function credit()
    {
        return $this->belongsTo(IndosatUsersCredit::class, 'user_id', 'user_id');
    }
}
