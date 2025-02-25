<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
   protected $fillable = ['name', 'slug'];

   public function portfolios()
   {
       $this->hasMany(Portfolio::class);
   }

    public function videos()
    {
        return $this->hasMany(Videos::class);
    }
}
