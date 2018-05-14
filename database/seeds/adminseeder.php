<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Admin;

class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $User = new User;
      $User->username = 'admin';
      $User->password = bcrypt('admin');
      $User->status     = 1;
      $User->save();

      $UserId = User::orderBy('id', 'desc')
                ->first()
                ->id;

      $Admin = new Admin;
      $Admin->nama       = 'Kisahnya Admin';
      $Admin->nohp       = '085654864546';
      $Admin->email      = 'tomycules@gmail.com';
      $Admin->user_id    = $UserId;
      $Admin->save();
    }
}
