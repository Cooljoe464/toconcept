<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{
   use HasFactory, HasUuids;
    protected $fillable = ['uuid','names', 'photos', 'link'];

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
}
