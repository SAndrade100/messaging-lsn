<?php

namespace App\Models;

use Database\Factories\TenantFactory;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Tenant extends Model
{
    use Authenticatable, HasApiTokens, HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function notifications(): HasMany 
    {
        return $this->hasMany(Notification::class);
    }
}
