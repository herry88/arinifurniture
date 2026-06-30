<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_name',
        'address',
        'phone',
        'email',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'copyright_text',
        'app_download_image',
        'sales_whatsapp_numbers',
    ];
}
