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
                    <form action="{{ route('kelas.edit', $kelas->id_kelas) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-header">
                            <h4>{{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>ID Kelas</label>
                                <input type="text" class="form-control @error ('id_kelas') is-invalid @enderror" required="" name="id_kelas" value="{{ $kelas->id_kelas }}" readonly>
                                @error('id_kelas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                <input type="text" class="form-control @error ('nama_kelas') is-invalid @enderror" required="" name="nama_kelas" value="{{ $kelas->nama_kelas }}">
                                @error('nama_kelas')
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