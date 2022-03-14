<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('dashboard') }}">St</a>
      </div>
      <ul class="sidebar-menu">
        @if (auth()->user()->level == "siswa")
          <li class="menu-header">List Data Kelas</li>
            <li class="nav-item dropdown">
              <a href="{{ route('dashboard.listkelas') }}" class="nav-link"><i class="fas fa-fire"></i><span>Data Kelas</span></a>
            </li>
        @endif

        @if(auth()->user()->level == "admin")
            <li class="menu-header">List Data Kelas</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Data Kelas</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('dashboard.listkelas') }}">List Data Kelas</a></li>
                  <li><a class="nav-link" href="{{ route('dashboard.tambah_kelas') }}">Tambah Data Kelas</a></li>
                </ul>
            </li>
            <li class="menu-header">List Data Siswa</li>
                <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Data Siswa</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('dashboard.listsiswa') }}">List Data Siswa</a></li>
                  <li><a class="nav-link" href="{{ route('dashboard.tambah_siswa') }}">Tambah Data Siswa</a></li>
                </ul>
            </li>
            <li class="menu-header">Profil Sekolah</li>
                <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Profil Sekolah</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('dashboard.listposts') }}">List Post</a></li>
                  <li><a class="nav-link" href="{{ route('dashboard.tambah_posts') }}">Tambah Post</a></li>
                </ul>
            </li>
        @endif
        </ul>
    </aside>
  </div>
