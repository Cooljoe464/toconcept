<?php

namespace App\Models;

use Illuminate\Container\Attributes\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;
    protected $fillable = ['id','title', 'tag', 'tag_id', 'video_id'];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

}
