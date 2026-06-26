<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppConfig extends Model
{
    protected $fillable = [
        'instansi_name',
        'instansi_address',
        'instansi_phone',
        'instansi_email',
        'logo',
        'active_theme',
        'footer_text',
        'social_media_facebook',
        'social_media_instagram',
        'social_media_twitter'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
