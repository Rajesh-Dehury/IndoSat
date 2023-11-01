<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndosatUsersCredit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'indosat_users_credit';
}
