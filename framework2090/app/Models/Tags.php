<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tags extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['uuid', 'name', 'slug', 'description'];
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


   public function portfolios()
   {
       $this->hasMany(Portfolio::class, 'tag_id', 'uuid');
   }

    public function videos()
    {
        return $this->hasMany(Videos::class, 'tag_id', 'uuid');
    }
}
