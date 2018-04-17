<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
      protected $fillable = [  'title', 'slug','subject','user_id' ];

  public function user()
   {
     return $this->belongsTo('App\Models\Auth\User');
   }

   public function tags()
   {
     return $this->belongsToMany('App\Models\Auth\Tag');
   }
}
