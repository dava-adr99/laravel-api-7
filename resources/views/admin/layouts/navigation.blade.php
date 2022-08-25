<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{ asset('images/logo2.png') }}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('/admin') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    <a href="{{ url('/admin/mahasiswa') }}"> <i class="menu-icon fa fa-dashboard"></i>Mahasiswa </a>
                    <a href="{{ url('/admin/petugas') }}"> <i class="menu-icon fa fa-dashboard"></i>Petugas</a>
                    <a href="{{ url('/admin/peminjaman') }}"> <i class="menu-icon fa fa-dashboard"></i>Peminjaman</a>
                    <a href="{{ url('/admin/pengembalian') }}"> <i class="menu-icon fa fa-dashboard"></i>Pengembalian</a>
                    <a href="{{ url('/admin/buku') }}"> <i class="menu-icon fa fa-dashboard"></i>Buku</a>
                    <a href="{{ url('/admin/rak') }}"> <i class="menu-icon fa fa-dashboard"></i>Rak</a>
                </li>
                
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
