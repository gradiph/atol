@if(Auth::user())
	@if(Auth::user()->level == 'Admin')
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL('admin') }}">Mobilocator</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="glyphicon glyphicon-menu-hamburger"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ URL('admin') }}">Home</a></li>
                        <li><a href="{{ URL('admin/pemilik-usaha') }}">Data Pemilik Usaha</a></li>
                        <li><a href="{{ URL('admin/wilayah') }}">Data Wilayah</a></li>
                        <li><a href="{{ URL('admin/sektor-usaha') }}">Data Sektor Usaha</a></li>
                        <li><a href="{{ URL('admin/skala-usaha') }}">Data Skala Usaha</a></li>
                        <li><a href="{{ URL('admin/data-usaha') }}">Data Usaha</a></li>
                        <li><a href="{{ URL('admin/laporan') }}">Laporan</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ URL('admin/user/'.Auth::user()->id) }}"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->nama }}</a></li>
                        <li><a href="{{ URL('admin/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    @elseif(Auth::user()->level == 'SuperAdmin')
    	<nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL('superadmin') }}">Mobilocator</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="glyphicon glyphicon-menu-hamburger"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ URL('superadmin') }}">Home</a></li>
                        <li><a href="{{ URL('superadmin/user') }}">Data Akun</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ URL('superadmin/user/'.Auth::user()->id) }}"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->nama }}</a></li>
                        <li><a href="{{ URL('superadmin/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif
@endif