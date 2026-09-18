<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    /** @var list<string> */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'education_level',
        'institution',
        'skills',
        'profile_image',
        'joined_at',
        'is_active',
    ];

    /** @var array<string, string> */
    protected $casts = [
        'joined_at' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Scope for active members only.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
