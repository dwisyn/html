@extends('app')
@section('title')
    Tambah Akun Pelanggan
@endsection

@section('content')
<div class="panel panel-default">
<div class="panel-body">
<h4><i class="fa fa-plus-square"></i> TAMBAH AKUN PELANGGAN</h4><hr>
<div class="row"><div class="col-md-3">
<div class="list-group">
	<a href="#" class="list-group-item active"><i class="fa fa-cogs"></i> MENU AKUN PELANGGAN  </a>
	<a href="/akun_pelanggan" class="list-group-item"><i class="fa fa-refresh"></i> Tampilkan Semua</a>
	<a href="/home" class="list-group-item">	<i class="fa fa-home"></i> Home</a>
</div>
</div>
<div class="col-md-6">
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif

<div class="panel panel-default">
<div class="panel-body">
{!! Form::open(array('url' => env('APP_URL').'akun_pelanggan' ,'method'=>'post')) !!}
<div class="form-group">
{!! Form::label('iduser', 'iduser') !!}
{!! Form::text('iduser',null, array('class' => 'form-control','placeholder'=>'iduser')) !!}</div>
</div>
<div class="form-group">
{!! Form::label('user', 'user') !!}
{!! Form::text('user', null, array('class' =>'form-control','placeholder'=>'user')) !!}
</div>
<div class="form-group">
{!! Form::label('password', 'password') !!}
{!! Form::text('password', null, array('class' =>'form-control','placeholder'=>'password')) !!}
</div>
<div class="form-group">
{!! Form::label('jarak', 'Jarak device-BT') !!}
{!! Form::text('jarak', null, array('class' =>'form-control','placeholder'=>'Jarak device-BT')) !!}
</div>

<div class="form-group">
{!! Form::label('email', 'email') !!}
{!! Form::text('email', null, array('class' =>'form-control','placeholder'=>'email')) !!}
</div>

<div class="form-group">
{!! Form::label('pro', 'pro') !!}
{!! Form::text('pro', null, array('class' =>'form-control','placeholder'=>'pro')) !!}
</div>


<div class="form-group">
{!! Form::label('idrumah_fk', 'Rumah') !!}
{!! Form::select('idrumah_fk', $rmh ,null , array('class' => 'form-control')) !!}
</div>

{!! Form::button('<i class="fa fa-plus-square"></i>'. ' Simpan', array('type' => 'submit', 'class' => 'btn btn-primary'))!!}
{!! Form::button('<i class="fa fa-times"></i>'. ' Reset', array('type' => 'reset', 'class' => 'btn btn-danger'))!!}
{!! Form::close()!!}
</div></div></div></div></div></div>
@endsection

