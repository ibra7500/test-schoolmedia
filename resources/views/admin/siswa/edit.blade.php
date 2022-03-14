<?php 
    if (auth()->user()->level == "siswa") {   
?>
    <script>
        window.location.replace("{{ url('/dashboard/kelas') }}");
    </script>
<?php
    }
?>

@extends('admin.templates.master')
@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>

        <div class="section-body">

            <div class="row">
            <div class="col-6 col-md-12 col-lg-6">
                <div class="card">
                    <form action="{{ route('siswa.edit', $siswa->nisn) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-header">
                            <h4>{{ $title }} dengan NISN {{ $siswa->nisn }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control @error ('nisn') is-invalid @enderror" required="" name="nisn" value="{{ $siswa->nisn }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control @error ('nama') is-invalid @enderror" required="" name="nama" value="{{ $siswa->nama }}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="id_kelas" class="d-block" >Pilih Kelas</label>
                                <select class="form-control" name="id_kelas">
                                    <option disabled selected>Pilih Kelas</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{$k->id_kelas}}" {{$siswa->id_kelas == $k->id_kelas ? 'selected' : ''}}>{{$k->nama_kelas}}</option>
                                    @endforeach   
                                </select>
                                @error('id_kelas')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror  
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" id="" cols="30" rows="10" class="form-control  @error ('alamat') is-invalid @enderror required">{{ $siswa->alamat }}</textarea>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input id="tanggal_lahir" type="date" class="form-control @error ('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" required value="{{ $siswa->tanggal_lahir }}">
                                @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror  
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin" class="d-block" >Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                  <option value="Laki-laki" {{$siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                                  <option value="Perempuan" {{$siswa->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror  
                            </div>
                            <div class="form-group">
                                <label for="no_telp" class="d-block">No Telpon</label>
                                <input id="no_telp" type="text" class="form-control @error ('no_telp') is-invalid @enderror" name="no_telp" required value="{{ $siswa->no_telp }}">
                                @error('no_telp')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror  
                              </div>  
                            </div>  
                        </div>
                        <div class="card-footer text-left">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection