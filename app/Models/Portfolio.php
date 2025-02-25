<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{

    protected $fillable =['id','title','tags_id', 'tags', 'image'];

    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }

    public function scopeIdDescending($query)
    {
        return $query->sortAsc();
    }
}
