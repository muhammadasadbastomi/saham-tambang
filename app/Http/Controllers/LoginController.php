<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use IDCrypt;
use App\User;
use App\Admin;
use App\Investor;

class LoginController extends Controller
{
  public function DataAdmin($Id){
$Admin = Admin::with('User')
              ->find($Id);

return $Admin;
}

public function DataInvestor($Id){
$Investor = Investor::with('User')
              ->find($Id);

return $Investor;
}

public function JsonLogin($username){
$User = User::where('username', $username)
            ->first();
if ($User) {
  if ($User->tipe == 1) {
    $DataUser = Admin::where('user_id', $User->id)
    ->first();
  } elseif ($User->tipe == 2) {
    $DataUser = Investor::where('user_id', $User->id)
    ->first();
  }
  return $DataUser;
}
return 'default.png';
}
}
