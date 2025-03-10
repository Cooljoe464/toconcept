<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $keyType = 'string'; // Set key type to string
    public $incrementing = false; // Disable auto-incrementing ID
    protected $primaryKey = 'uuid';

    protected $fillable = ['uuid', 'title', 'tags_id', 'tags', 'image'];

    protected static function boot()
    {
        parent::boot();

        // Auto-generate UUID when creating a new record
        static::creating(function ($model) {
            $model->uuid = (string)Str::uuid();
        });
    }


    public function scopeIdDescending($query)
    {
        return $query->sortAsc();
    }
}
