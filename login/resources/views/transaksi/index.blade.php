@extends('app')
@section('title')
    Data Transaksi
@endsection
@section('content')
<div class="panel panel-default">
<div class="panel-body">
<h4><i class="fa fa-university"></i> DAFTAR TRANSAKSI</h4><hr>
<div class=row><div class="col-md-6">
<a href="/transaksi/create" class="btn btn-primary">
<i class="fa fa-plus-circle"></i> Tambah</a>
</div><div class="col-md-2"></div><div class="col-md-4">            </div></div><br>
@if($transaksis->count())
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover table-condensed tfix">
<thead align="center">
<tr>
	<td><b>IDUSER</b></td>
	<td><b>USER</b></td>
	<td><b>ALAMAT</b></td>
	<td><b>MAC</b></td>
	<td><b>FILE</b></td>
	<td><b>created_at</b></td>
    <td colspan="2"><b>MENU</b></td>
</tr>
</thead>

@foreach($transaksis as $transaksi)
<tr>
	<td>{{ $transaksi->iduser_tr }}</td>
	<td>{{ $transaksi->akun_pelanggan->user }}</td>
	<td>{{ $transaksi->akun_pelanggan->rumah->alamat }}</td>
	<td>{{ $transaksi->akun_pelanggan->rumah->mac }}</td>
	<td><a href="javascript:void(0);" onclick="showFile('{{ $transaksi->file }}');">{{ $transaksi->file }}</a></td>
	<td>{{ $transaksi->created_at }}</td>


	<td align="center" width="30px">
	<a href="/transaksi/{{$transaksi->iduser_tr}}/edit" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square"></i> Edit</a></td>

	<td align="center" width="30px">
	{!! Form::open(array('url' => env('APP_URL').'transaksi/'.$transaksi->iduser_tr ,'method'=>'delete','style' => 'display:inline')) !!}
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
 <i class="fa fa-exclamation-triangle"></i> Data Transaksi tidak Ada
  </div>
@endif
</div></div>
<div class="modal fade" tabindex="-1" role="dialog" id="modalDokumen">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header danger">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="judulModal"><b></b>File</h4>
      </div>
      <div class="modal-body">
        <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-0">
            
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center">
                    <label for=""></label>
                    <a id="imageModal" href="" data-dismiss="modal" data-sub-html="Demo Description">
                        <img id="imageModal" data-dismiss="modal" class="img-responsive thumbnail" src="">
                    </a>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

<script type="text/javascript">
    showFile = function (nama) {
        var tipe = nama.split('.');
        if (tipe[1] != 'pdf') {
            $('img#imageModal').attr('src', '/image/' + nama);
            $('a#imageModal').attr('href', '/image/' + nama);
            $('#modalDokumen').modal('show');
        } else {
            var url = '/image/' + nama;
            window.open(url, '_blank');
        }
    }
    close = function () {
        $('#modalDokumen').modal('hide');
    }
</script>
