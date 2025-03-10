<?php

namespace App\Models;

use Illuminate\Container\Attributes\Tag;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Videos extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['uuid','title', 'tag', 'tag_id', 'video_id'];


    protected $keyType = 'string'; // Set key type to string
    public $incrementing = false;  // Disable auto-incrementing ID
    protected $primaryKey = 'uuid';
    protected static function boot()
    {
        parent::boot();

        // Auto-generate UUID when creating a new record
        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'uuid');
    }

}
