<?php 
    if (auth()->user()->level == "siswa") {   
?>
    <script>
        window.location.replace("{{ url('/dashboard') }}");
    </script>
<?php
    }
?>

@extends('admin.templates.master')

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h3>{{$title}}</h3>
      <div class="section-body">
      </div>
    </section>
    
    <div class="row">
        <div class="col-md-12">
          @if (session('success'))
          <div class="card-body">
            <div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>&times;</span>
                </button>
                {{ session('success') }}
              </div>
          </div>
          @endif
          @if (session('error'))
          <div class="card-body">
            <div class="alert alert-warning alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>&times;</span>
                </button>
                {{ session('error') }}
              </div>
          </div>
          @endif
          <div class="card">
            <div class="card-header">
              <h4>{{$title}}</h4>
            </div>
            <div class="card-body p-0">
                <?php 
                    $count = $siswa->count();
                    if ($count == 0)
                    {
                ?>
                 <h5 class="mx-4">Tidak ada data siswa</h5>
                 <?php } else { ?>
              <div class="table-responsive table-invoice">
                <table class="table table-striped">
                  <tr>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telpon</th>
                    <th>Aksi</th>
                  </tr>
                  @foreach($siswa as $s)
                  <tr>
                    <td>{{$s->nisn}}</td>
                    <td>{{$s->nama}}</td>
                    <td>{{$s->nama_kelas}}</td>
                    <td>{{$s->tanggal_lahir}}</td>
                    <td>{{$s->alamat}}</td>
                    <td>{{$s->jenis_kelamin}}</td>
                    <td>{{$s->no_telp}}</td>
                    <td>
                      <a href="{{ route('dashboard.edit_siswa',$s->nisn)}}" class="btn btn-success">Edit</a>
                      <a href="{{ route('siswa.delete',$s->nisn)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
    </div>
</div>
@endsection