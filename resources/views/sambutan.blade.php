@extends('templates.master')

@section('konten')

<div class="container my-3">
    <?php
    $count = $data->count();
    if ($count == 0 ) {
    ?>

    <h3 class="text-center">Maaf, konten belum ada</h3>

    <?php } else {
    ?>
    @foreach ($data as $item)
    <h3 class="text-center">{{ $item->title }}</h3>
    <div class="text-justified my-5">
    {!! $item->content !!}
    @endforeach
    </div>
    <?php } ?>
</div>

@endsection