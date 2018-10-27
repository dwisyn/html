@extends('app')
@section('title')
    Tambah Data Transaksi
@endsection

@section('content')
<div class="panel panel-default">
<div class="panel-body">
<h4><i class="fa fa-plus-square"></i> TAMBAH TRANSAKSI</h4><hr>
<div class="row"><div class="col-md-3">
<div class="list-group">
	<a href="#" class="list-group-item active"><i class="fa fa-cogs"></i> MENU TRANSAKSI  </a>
	<a href="/transaksi" class="list-group-item"><i class="fa fa-refresh"></i> Tampilkan Semua</a>
	<a href="/home" class="list-group-item"><i class="fa fa-home"></i> Home</a>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-body">
{!! Form::open(array('url' => env('APP_URL').'transaksi' ,'method'=>'post')) !!}
<div class="form-group">
{!! Form::label('iduser_tr', 'user') !!}
{!! Form::select('iduser_tr', $ap ,null , array('class' => 'form-control')) !!}
</div>

<div class="form-group">
{!! Form::label('file', 'Nama File') !!}
{!! Form::text('file',null, array('class' => 'form-control','placeholder'=>'Nama File')) !!}</div>
</div>
{!! Form::button('<i class="fa fa-plus-square"></i>'. ' Simpan', array('type' => 'submit', 'class' => 'btn btn-primary'))!!}
{!! Form::button('<i class="fa fa-times"></i>'. ' Reset', array('type' => 'reset', 'class' => 'btn btn-danger'))!!}
{!! Form::close()!!}
</div></div></div></div></div></div>
@endsection

