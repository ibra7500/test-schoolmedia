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
                    $count = $kelas->count();
                    if ($count == 0)
                    {
                ?>
                 <h5 class="mx-4">Tidak ada data kelas</h5>
                 <?php } else { ?>
              <div class="table-responsive table-invoice">
                <table class="table table-striped">
                  <tr>
                    <th>No</th>
                    <th>ID Kelas</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                  </tr>
                  <?php
                    $no = 1;
                  ?>
                  @foreach($kelas as $k)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$k->id_kelas}}</td>
                    <td>{{$k->nama_kelas}}</td>
                    <td>
                      @if(Auth::user()->level == 'admin')
                      <a href="{{ route('dashboard.edit_kelas',$k->id_kelas)}}" class="btn btn-success">Edit</a>
                      <a href="{{ route('kelas.delete',$k->id_kelas)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                      @endif
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