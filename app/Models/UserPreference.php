<?php

namespace App\Models;

use App\Enums\Channel;
use Database\Factories\UserPreferenceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category',
        'channel',
        'enabled',
        'quiet_hours_start',
        'quiet_hours_end',
        'timezone',
    ];

    protected function casts(): array 
    {
        return [
            'channel' => Channel::class, 
            'enabled' => 'boolean',
        ];
    }

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }
}
