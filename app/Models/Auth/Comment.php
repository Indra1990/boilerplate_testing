<?php


namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
  protected $fillable = [ 'subject' , 'user_id', 'quote_id'];

  public function quote()
    {
         return $this->belongsTo('App\Models\Auth\Quote');
    }

    public function user()
     {
       return $this->belongsTo('App\Models\Auth\User');
     }

}
