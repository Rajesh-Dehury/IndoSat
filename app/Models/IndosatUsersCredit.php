<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndosatUsersCredit extends Model
{
    use HasFactory;
    protected $table = 'indosat_users_credit';

    public function usedCredits()
    {
        return $this->hasMany(IndosatUsersUsedCredit::class, 'user_id', 'user_id');
    }
}
