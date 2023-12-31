<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class IndosatUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    function credits(): HasMany
    {
        return $this->hasMany(IndosatUsersCredit::class, 'user_id', 'id');
    }

    public function getTotalUserCredits()
    {
        return $this->credits->sum('credit');
    }

    public function getTotalExpiryCredits()
    {
        return $this->credits->where('expired', '<=', now())->sum('credit');
    }
    
    public function getTotalWebinarUserCredits()
    {
        return $this->credits->where('type', 1)->sum('credit');
    }
    public function getTotalWebinarExpiryCredits()
    {
        return $this->credits->where('type', 1)->where('expired', '<=', now())->sum('credit');
    }
    public function getTotalWebinarUsedCredits()
    {
        return $this->credits->where('type', 1)->where('is_credit', 2)->sum('credit');
    }

    function userEvents(): HasMany
    {
        return $this->hasMany(IndosatEventUser::class, 'indosat_user_id', 'id');
    }

    function webinarPreferences(): HasMany
    {
        return $this->hasMany(UserWebinarPreference::class, 'user_id', 'id');
    }
}
