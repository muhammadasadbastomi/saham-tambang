@extends('user.Layout.Master')
@section('content')
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit Data Admin</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <button onclick="redirect('{{route('DataAdmin')}}')" class="btn btn-success">
                <i class="fa fa-arrow-circle-left"></i>
                Kembali
              </button>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              {!! Form::open(['url'=>route('submitEditDataAdmin',['id' => IDCrypt::Encrypt($Admin->id)]),'files'=>true,'class'=>'register-form', 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                {{ csrf_field() }}
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    No. Induk
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control col-md-12 col-xs-12" name="nomorinduk" value="{{$Admin->nomorinduk}}" required pattern="[0-9]+" title="Input hanya boleh angka dan tidak menggunakan spasi">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Nama
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control col-md-12 col-xs-12" name="nama" value="{{$Admin->nama}}" required pattern="(.,[a-z]\s)(.,[A-Z]\s).{6,}+" title="Input tidak menggunakan angka">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    No. Hp
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control col-md-12 col-xs-12" name="nohp" value="{{$Admin->nohp}}" required pattern="[0-9]+" title="Input hanya boleh angka dan tidak menggunakan spasi">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Email
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="email" class="form-control col-md-12 col-xs-12" name="email" value="{{$Admin->email}}" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Foto
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="file" class="form-control col-md-12 col-xs-12" name="foto" >
                    <label class="control-label text-left col-md-3 col-sm-2 col-xs-12">
                      Isi foto jika ingin di ganti
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Username
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control col-md-12 col-xs-12" name="username" value="{{$Admin->User->username}}" required pattern="^[A-Za-z0-9]{6,}$" title="Input tidak menggunakan spasi dan minimal 6 karakter">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Password
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control col-md-12 col-xs-12" name="password" placeholder="Isi jika ingin mengubah password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <button type="submit" class="btn btn-danger">Batal</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
