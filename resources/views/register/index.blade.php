@guest
@extends('login.master')
@section('konten')
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST" action="/register">
                  @csrf
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="nisn">NISN</label>
                      <input id="nisn" type="text" class="form-control @error ('nisn') is-invalid @enderror" name="nisn" autofocus required value="{{ old('nisn') }}">
                      @error('nisn')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="nama">Nama Lengkap</label>
                      <input id="nama" type="text" class="form-control @error ('nama') is-invalid @enderror" name="nama" required value="{{ old('nama') }}">
                      @error('nama')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control @error ('email') is-invalid @enderror" name="email" required value="{{ old('email') }}">
                      @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control @error ('password') is-invalid @enderror" name="password" required>
                      @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror  
                    </div>  
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="alamat" class="d-block">Alamat</label>
                      <input id="alamat" type="text" class="form-control @error ('alamat') is-invalid @enderror" name="alamat" required value="{{ old('alamat') }}">
                      @error('alamat')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror  
                    </div>  
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="tanggal_lahir" class="d-block">Tanggal Lahir</label>
                      <input id="tanggal_lahir" type="date" class="form-control @error ('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" required value="{{ old('tanggal_lahir') }}">
                      @error('tanggal_lahir')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror  
                    </div>  
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="jenis_kelamin" class="d-block @error ('jenis_kelamin') is-invalid @enderror">Jenis Kelamin</label>
                      <select class="form-control" name="jenis_kelamin">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      @error('jenis_kelamin')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror  
                    </div>  
                    <div class="form-group col-12">
                      <label for="no_telp" class="d-block">No Telpon</label>
                      <input id="no_telp" type="text" class="form-control @error ('no_telp') is-invalid @enderror" name="no_telp" required value="{{ old('no_telp') }}">
                      @error('no_telp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror  
                    </div>  
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@else
<script>
  window.location.replace("{{ url('/dashboard') }}");
</script>
@endguest