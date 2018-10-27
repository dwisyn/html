@extends('app')
@section('title')
    Tambah Data Rumah
@endsection

@section('content')
<div class="panel panel-default">
<div class="panel-body">
<h4><i class="fa fa-plus-square"></i> TAMBAH RUMAH</h4><hr>
<div class="row"><div class="col-md-3">
<div class="list-group">
	<a href="#" class="list-group-item active">
	<i class="fa fa-cogs"></i> MENU RUMAH  </a>
	<a href="/rumah" class="list-group-item">
	<i class="fa fa-refresh"></i> Tampilkan Semua</a>
	<a href="/home" class="list-group-item">
	<i class="fa fa-home"></i> Home</a>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-body">


{!! Form::open(array('url' => env('APP_URL').'rumah' ,'method'=>'post')) !!}
<div class="form-group">
{!! Form::label('idrumah', 'idrumah') !!}
{!! Form::text('idrumah',null, array('class' => 'form-control','placeholder'=>'idrumah')) !!}</div>
</div>
<div class="form-group">
{!! Form::label('alamat', 'alamat Rumah') !!}
{!! Form::text('alamat', null, array('class' =>'form-control','placeholder'=>'alamat Rumah')) !!}
</div>
<div class="form-group">
{!! Form::label('uuid', 'Kode uuid') !!}
{!! Form::text('uuid', null, array('class' =>'form-control','placeholder'=>'Kode uuid')) !!}
</div>
<div class="form-group">
{!! Form::label('mac', 'Kode mac') !!}
{!! Form::text('mac', null, array('class' =>'form-control','placeholder'=>'Kode mac')) !!}
</div>
{!! Form::button('<i class="fa fa-plus-square"></i>'. ' Simpan', array('type' => 'submit', 'class' => 'btn btn-primary'))!!}
{!! Form::button('<i class="fa fa-times"></i>'. ' Reset', array('type' => 'reset', 'class' => 'btn btn-danger'))!!}
{!! Form::close()!!}
</div>

</div></div></div></div></div>
@endsection

