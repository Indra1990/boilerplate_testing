<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $fillable = [ 'tag_name' , 'slug'];

  public function quotes()
  {
    return $this->belongsToMany('App\Models\Auth\Quote');
  }
}
