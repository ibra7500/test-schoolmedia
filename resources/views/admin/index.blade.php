@extends('admin.templates.master')

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        @if (auth()->user()->level == "siswa")
            <h3>Berhasil login sebagai siswa</h3>
        @endif
        @if (auth()->user()->level == "admin")
            <h3>Berhasil login sebagai admin</h3>
        @endif
      <div class="section-body">
      </div>
    </section>
</div>
@endsection