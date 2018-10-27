<!-- HEADER -->
<!-- <nav class="navbar navbar-default navbar-fixed-top navShadow">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
	<span class="sr-only">Toggle Navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</button>
</div>
<div class="collapse navbar-collapse" id="app-navbar-collapse"> -->
<!-- Left Side Of Navbar -->
<!-- <ul class="nav navbar-nav">
	<li><a href="/home" ><i class="fa fa-home"></i>
	&nbsp;&nbsp;Home</a></li>
	<li><a href="/rumah" ><i class="fa fa-user"></i>
	&nbsp;&nbsp;Rumah</a></li>
	<li><a href="/akun_pelanggan"><i class="fa fa-university"></i>
	&nbsp;&nbsp;Akun Pelanggan</a></li>
	<li><a href="/transaksi"> <i class="fa fa-book"></i>
	&nbsp;&nbsp;TRANSAKSI</a></li>

</ul>
</div>
</div>
</nav>
<br><br><br><br> -->
 <!-- END HEADER -->

<header class="main-header">
	<!-- Logo -->
	<a href="/home" class="logo">
	  <!-- mini logo for sidebar mini 50x50 pixels -->
	  <span class="logo-mini"><b>A</b>LT</span>
	  <!-- logo for regular state and mobile devices -->
	  <span class="logo-lg"><b>Admin</b>LTE</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
	  <!-- Sidebar toggle button-->
	  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
	    <span class="sr-only">Toggle navigation</span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	  </a>

	  <div class="navbar-custom-menu">
	    <ul class="nav navbar-nav">
	      <!-- User Account: style can be found in dropdown.less -->
	      <li class="dropdown user user-menu">
            <div class="pull-right" style="margin-top: 15%;">
              @if(Auth::guard('admin')->check())

                  <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();" style="color: white; margin-right: 20px;">Signout <i class="glyphicon glyphicon-off"></i>
                  </a>

                  <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
				@endif
            </div>
	      </li>
	    </ul>
	  </div>
	</nav>
</header>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        @if(Auth::user()->role == 'admin')
        <li><a href="/rumah"><i class="fa fa-user"></i> <span>Rumah</span></a></li>
        @endif
        <li><a href="/akun_pelanggan"><i class="fa fa-university"></i> <span>Akun Pelanggan</span></a></li>
        <li><a href="/transaksi"><i class="fa fa-book"></i> <span>Transaksi</span></a></li>
        <li><a href="/logout"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
