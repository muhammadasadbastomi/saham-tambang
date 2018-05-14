<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Auth;
use File;
use Carbon;
use IDCrypt;
use Tanggal;
use DataUser;
use ArrayHelper;

use App\User;
use App\Admin;
use App\Investor;


class AdminController extends Controller
{
    public function dashboard()
    {
      return view('admin.index');
    }

    public function DataAdmin()
    {
    $Admin = Admin::all();

    return view('admin.DataAdmin', ['Admin' => $Admin]);
    }

    public function submitTambahDataAdmin(Request $request)
  {
    $this->validate($request, [
      'username' => [
          Rule::unique('users')
        ],
    ]);

    $User  = new User;

    $User->username = $request->username;
    $User->password = bcrypt($request->password);;
    $User->tipe     = 1;
    $User->save();

    $IdUser = User::orderBy('id', 'desc')
                  ->first()
                  ->id;

    $Admin = new Admin;

    $Admin->nomorinduk = $request->nomorinduk;
    $Admin->nama       = $request->nama;
    $Admin->nohp       = $request->nohp;
    $Admin->email      = $request->email;
    if ($request->foto) {
      $FotoExt  = $request->foto->getClientOriginalExtension();
      $FotoName = 'Admin - '.$request->nama.' - '.IDCrypt::Encrypt($User->id);
      $Foto     = $FotoName.'.'.$FotoExt;
      $request->foto->move('images/User', $Foto);
      $Admin->foto = $Foto;
    }else {
      $Admin->foto = 'default.png';
    }
    $Admin->user_id = $IdUser;
    $Admin->save();

    return redirect(route('DataAdmin'))->with('success', 'Data Admin '.$request->nama.' Berhasil di Tambah');
  }

  public function EditDataAdmin($Id)
  {
    $Id = IDCrypt::Decrypt($Id);
    $Admin = Admin::find($Id);

    return view('user.EditDataAdmin', ['Admin'=>$Admin]);
  }
  public function submitEditDataAdmin(Request $request, $Id)
  {
    $Id = IDCrypt::Decrypt($Id);
    $Admin = Admin::find($Id);
    $User  = User::find($Admin->user_id);

    $this->validate($request, [
      'username' => [
          Rule::unique('users')->ignore($User->username, 'username'),
        ],
    ]);

    $User->username = $request->username;
    if ($request->password) {
      $User->password = bcrypt($request->password);
    }

    $Admin->nomorinduk = $request->nomorinduk;
    $Admin->nama       = $request->nama;
    $Admin->nohp       = $request->nohp;
    $Admin->email      = $request->email;
    if ($request->foto) {
      if ($Admin->foto != 'default.png') {
        File::delete('images/User/'.$Admin->foto);
      }
      $FotoExt  = $request->foto->getClientOriginalExtension();
      $FotoName = 'Admin - '.$request->nama.' - '.IDCrypt::Encrypt($User->id);
      $Foto     = $FotoName.'.'.$FotoExt;
      $request->foto->move('images/User', $Foto);
      $Admin->foto = $Foto;
    }

    $User->save();
    $Admin->save();

    return redirect(route('DataAdmin'))->with('success', 'Data Admin '.$request->nama.' Berhasil di Ubah');
  }

  public function HapusDataAdmin($Id)
  {
    $Id = IDCrypt::Decrypt($Id);
    $Admin = Admin::find($Id);
    $User = User::find($Admin->user_id);

    if ($Admin->foto != 'default.png') {
      File::delete('images/User/'.$Admin->foto);
    }

    $Admin->delete();
    $User->delete();

    return redirect(route('DataAdmin'))->with('success', 'Data Admin Berhasil di Hapus');
  }

    // public function DataInvestor()
    // {
    // $Investor = Investor::all();
    //
    // return view('admin.DataAdmin', ['Admin' => $Admin]);
    // }
}
