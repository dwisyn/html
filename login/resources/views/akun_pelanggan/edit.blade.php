@extends('app')
@section('title')
    Edit AKUN PELANGGAN
@endsection
@section('content')
<div class="panel panel-default">
<div class="panel-body">
<h4><i class="fa fa-check-square">
</i> EDIT DATA AKUN PELANGGAN</h4><hr>
<div class="row"><div class="col-md-3">
<div class="list-group">
<a href="#" class="list-group-item active"><i class="fa fa-cogs"></i> MENU AKUN PELANGGAN</a>
<a href="/akun_pelanggan" class="list-group-item"><i class="fa fa-refresh"></i> Tampilkan Semua</a>
<a href="/home" class="list-group-item"><i class="fa fa-home"></i> Home</a>
</div></div>
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
{!! Form::open(array('url' => env('APP_URL').'akun_pelanggan/'.$ap->iduser ,'method'=>'patch')) !!}
<div class="form-group">
{!! Form::label('iduser', 'iduser') !!}
{!! Form::text('iduser',$ap->iduser, array('class' => 'form-control','placeholder'=>'iduser')) !!}
</div>
<div class="form-group">
{!! Form::label('user', 'user') !!}
{!! Form::text('user', $ap->user, array('class' => 'form-control','placeholder'=>'user')) !!}
</div>

<div class="form-group">
{!! Form::label('password', 'password') !!}
{!! Form::text('password', $ap->password, array('class' => 'form-control','placeholder'=>'password')) !!}
</div>

<div class="form-group">
{!! Form::label('jarak', 'Jarak device-BT') !!}
{!! Form::text('jarak', $ap->jarak, array('class' => 'form-control','placeholder'=>'Jarak device-BT')) !!}
</div>

<div class="form-group">
{!! Form::label('email', 'email') !!}
{!! Form::text('email', $ap->email, array('class' => 'form-control','placeholder'=>'email')) !!}
</div>

<div class="form-group">
{!! Form::label('pro', 'pro') !!}
{!! Form::text('pro', $ap->pro, array('class' =>'form-control','placeholder'=>'pro')) !!}
</div>


<div class="form-group">
{!! Form::label('idrumah_fk', 'Alamat') !!}
{!! Form::select('idrumah_fk', $rmh ,$ap->idrumah_fk , array('class' => 'form-control')) !!}
</div>

{!! Form::button('<i class="fa fa-check-square"></i>'. ' Update', array('type' => 'submit', 'class' => 'btn btn-primary'))!!}
{!! Form::close()!!}
</div></div></div></div></div></div>
@endsection
