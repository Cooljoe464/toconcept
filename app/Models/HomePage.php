<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = 'home_page';
    protected $fillable = ['uuid', 'video_id', 'biography_home', 'biography_footer', 'biography_about', 'biography_photo', 'email1',
        'email2', 'phone1', 'phone2', 'address', 'map_address', 'facebook', 'twitter', 'linkedin', 'instagram', 'tiktok', 'youtube'];
}
