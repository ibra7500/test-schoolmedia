<?php 
    $id = Auth::user()->id;
    if (auth()->user()->id != $id) {   
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
            <h1>{{ $title }}</h1>
        </div>

        <div class="section-body">

            <div class="row">
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
            <div class="col-6 col-md-12 col-lg-6">
                <div class="card">
                    <form action="{{route('profile.edit')}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-header">
                            <h4>{{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control @error ('nisn') is-invalid @enderror" required="" name="nisn" value="{{$user->id}}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control @error ('nama') is-invalid @enderror" required="" name="nama" value="{{$user->nama }}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control @error ('email') is-invalid @enderror" required="" name="email" value="{{$user->email }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control @error ('alamat') is-invalid @enderror" required="" name="alamat" value="{{$user->alamat }}">
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir" class="d-block">Tanggal Lahir</label>
                                <input id="tanggal_lahir" type="date" class="form-control @error ('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" required value="{{ $user->tanggal_lahir }}">
                                @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror  
                            </div>
                            <div class="form-group">
                                <label for="no_telp" class="d-block">No Telpon</label>
                                <input id="no_telp" type="text" class="form-control @error ('no_telp') is-invalid @enderror" name="no_telp" required value="{{ $user->no_telp }}">
                                @error('no_telp')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror  
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