<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'governorate_id',
        'name_ar',
        'name_en',
    ];

    /**
     * Get the governorate that owns the city.
     */
    public function governorate(): BelongsTo
    {
        return $this->belongsTo(Governorate::class);
    }

    /**
     * Get the orders for the city.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
