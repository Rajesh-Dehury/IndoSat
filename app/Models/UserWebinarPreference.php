<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserWebinarPreference extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'user_webinar_preference';   
    public $timestamps = false;

    function webinarCategory(): BelongsTo
    {
        return $this->belongsTo(WebinarCategory::class, 'webinar_category_id', 'id');
    }
    function user(): BelongsTo
    {
        return $this->belongsTo(IndosatUser::class, 'user_id', 'id');
    }
}
