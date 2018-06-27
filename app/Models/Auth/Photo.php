<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
      protected $fillable = [  'filename', 'quote_id' ];

  public function quote()
   {
     return $this->belongsTo('App\Models\Auth\Quote');
   }

}
