<?php

namespace App\Models;

use App\Enums\Channel;
use Database\Factories\TemplateFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'version',
        'channel',
        'locale',
        'subject',
        'body',
        'is_active',
    ];

    protected function casts(): array 
    {
        return [
            'channel' => Channel::class, 
            'is_active' => 'boolean',
        ];
    }

    public function scopeActiveVersion($query, string $key, Channel $channel, string $locale)
    {
        return $query 
            ->where('key', $key)
            ->where('channel', $channel)
            ->where('locale', $locale)
            ->where('is_active', true)
            ->orderByDesc('version');
    }
}
