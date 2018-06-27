<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
      protected $fillable = [  'title', 'slug','subject','views','user_id' ];

  public function user()
   {
     return $this->belongsTo('App\Models\Auth\User');
   }

   public function tags()
   {
     return $this->belongsToMany('App\Models\Auth\Tag');
   }

  public function comments()
  {
      return $this->hasMany('App\Models\Auth\Comment');
  }

  public function photos()
  {
      return $this->hasMany('App\Models\Auth\Photo');
  }
}
