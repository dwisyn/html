@extends('app')
@section('title')
    Edit Dosen
@endsection
@section('content')
<div class="panel panel-default">
<div class="panel-body">
<h4><i class="fa fa-check-square">
</i> EDIT DATA RUMAH</h4><hr>
<div class="row"><div class="col-md-3">
<div class="list-group">
<a href="#" class="list-group-item active"><i class="fa fa-cogs"></i> MENU RUMAH</a>
<a href="/rumah" class="list-group-item"><i class="fa fa-refresh"></i> Tampilkan Semua</a>
<a href="/home" class="list-group-item"><i class="fa fa-home"></i> Home</a>
</div></div>
 <div class="col-md-6">
  <div class="panel panel-default">
  <div class="panel-body">
{!! Form::open(array('url' => env('APP_URL').'rumah/'.$rmh->idrumah ,'method'=>'patch')) !!}

<div class="form-group">
{!! Form::label('idrumah', 'IDRUMAH') !!}
{!! Form::text('idrumah',$rmh->idrumah, array('class' => 'form-control','placeholder'=>'IDRUMAH')) !!}
</div>
<div class="form-group">
{!! Form::label('alamat', 'Alamat Rumah') !!}
{!! Form::text('alamat', $rmh->alamat, array('class' => 'form-control','placeholder'=>'Alamat Rumah')) !!}
</div>

<div class="form-group">
{!! Form::label('uuid', 'Kode UUID') !!}
{!! Form::text('uuid',  $rmh->uuid, array('class' => 'form-control','placeholder'=>'Kode UUID')) !!}
</div>

<div class="form-group">
{!! Form::label('mac', 'Kode MAC') !!}
{!! Form::text('mac', $rmh->mac, array('class' => 'form-control','placeholder'=>'Kode MAC')) !!}
</div>

{!! Form::button('<i class="fa fa-check-square"></i>'. ' Update', array('type' => 'submit', 'class' => 'btn btn-primary'))!!}
{!! Form::close()!!}
</div></div></div></div></div></div>
@endsection
