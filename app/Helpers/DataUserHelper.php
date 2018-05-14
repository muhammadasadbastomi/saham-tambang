<?php

namespace App\Helpers;

use App\User;
use App\Admin;
use App\Investor;

class DataUserHelper
{
  public static function DataUser($User)
  {
    if ($User->tipe == 1) {
      $DataUser = Admin::where('user_id', $User->id)
                       ->first();
    } elseif ($User->tipe == 2) {
      $DataUser = Investor::where('user_id', $User->id)
                       ->first();
    }
    return $DataUser;
  }
}
