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
            <h1>{{$title}}</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">{{$title}}</h2>
        </div>
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                    <form action="{{ route('posts.insert') }}" method="post">
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                            <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi</label>
                            <div class="col-sm-12 col-md-7">
                            <textarea class="summernote-simple @error('content') is-invalid @enderror"" rows="10" style="width: 100%;" name="content">{{old('content')}}</textarea>
                                @error('content')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                            <button class="btn btn-primary">Publish</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>  
</div>

@endsection