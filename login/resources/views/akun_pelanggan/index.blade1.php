@extends('app')
@section('title')
    Data Rumah
@endsection
@section('content')
<div class="panel panel-default">
<div class="panel-body">
<h4><i class="fa fa-university"></i> DAFTAR AKUN PELANGGAN</h4><hr>
<div class=row><div class="col-md-6">
<a href="/akun_pelanggan/create" class="btn btn-primary">
<i class="fa fa-plus-circle"></i> Tambah</a>
</div><div class="col-md-2"></div><div class="col-md-4">            </div></div><br>
@if($akun_pelanggan->count())
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover table-condensed tfix">
<thead align="center">
<tr><td><b>IDUSER</b></td><td><b>USER</b></td><td><b>PASSWORD</b></td><td><b>LastDistance</b></td><td><b>RUMAH</b></td><td><b>ALAMAT</b></td><td><b>UUID</b></td><td><b>MAC</b></td>
    <td colspan="2"><b>MENU</b></td></tr>
</thead>

@foreach($akun_pelanggan as $m)
<tr><td>{{ $m->iduser }}</td><td>{{ $m->user }}</td><td>{{ $m->password }}
</td><td>{{ $m->jarak }}</td><td>{{ $m->idrumah }}</td>
<td>{{ $m->alamat }}</td><td>{{ $m->uuid }}</td><td>{{ $m->mac }}</td>
<td align="center" width="30px">
<a href="/akun_pelanggan/{{$m->iduser}}/edit" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square"></i> Edit</a></td>

<td align="center" width="30px">
{!! Form::open(array('route' => array('akun_pelanggan.destroy', $m->iduser),'method' => 'delete','style' => 'display:inline')) !!}
<button class='btn btn-sm btn-danger delete-btn' type='submit'>
<i class='fa fa-times-circle'></i> Delete </button>
{!! Form::close() !!}
</td>
 </tr>
@endforeach
</table>
</div>
@else
 <div class="alert alert-warning">
 <i class="fa fa-exclamation-triangle"></i> Data AKUN PELANGGAN tidak Ada
  </div>
@endif
</div></div>
@endsection
