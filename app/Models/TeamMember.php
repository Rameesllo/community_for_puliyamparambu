<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'section',
        'bio',
        'image',
        'email',
        'phone',
        'linkedin_url',
        'instagram_url',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'display_order' => 'integer',
    ];

    public static function sections(): array
    {
        return [
            'founders' => 'Founders',
            'team' => 'Team',
            'alumni' => 'Alumni',
        ];
    }
}
