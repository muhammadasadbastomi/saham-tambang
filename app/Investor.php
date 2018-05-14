<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
  public function User()
  {
    return $this->belongsTo('App\User');
  }
}
