<?php


namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function isOwner()
    {
   if (Auth::guest()) {
     return false;
   }
   return Auth::user()->id == $this->user->id;
 }

}
