@extends('app')

@section('title')
    Home
@endsection
@section('content')
<br><br>
<div class="col-md-4">
	<div class="panel panel-info text-center">
	   <div class="panel-heading">
			<h4>RUMAH</h4>
	   </div>
	   <ul class="list-group">
  		<li class="list-group-item"><i class="fa fa-user fa-5x"></i></li>
  		<li class="list-group-item"><a href="/rumah" class="btn btn-primary">
  		<i class="fa fa-user"></i> DATA RUMAH</a></li>
	</ul>
   </div>
</div>
 <div class="col-md-4">
        <div class="panel panel-info text-center">
            <div class="panel-heading">
                <h4>AKUN</h4>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><i class="fa fa-university fa-5x"></i></li>
                <li class="list-group-item"><a href="/akun_pelanggan" class="btn btn-primary">
		<i class="fa fa-university"></i> DATA AKUN PELANGGAN</a></li>
            </ul>
        </div>
    </div>
 <div class="col-md-4">
        <div class="panel panel-info text-center">
            <div class="panel-heading">
                <h4>TRANSAKSI</h4>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><i class="fa fa-book fa-5x"></i></li>
                <li class="list-group-item"><a href="/transaksi" class="btn btn-primary">
		<i class="fa fa-book"></i> DATA TRANSAKSI</a></li>
            </ul>
        </div>
    </div>

@endsection
              
