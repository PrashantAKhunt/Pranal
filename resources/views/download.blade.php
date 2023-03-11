@extends('layouts.master')

@section('content')

@if($urls)
    <h3>Downloaded files</h3>
    <div class="d-flex">
    @foreach ($urls as $obj)
        <div class="p-2 m-2">
            <a href="{{ $obj->url }}" download class="btn btn-primary">{{ $obj->qualityLabel }}</a>
        </div>
    @endforeach
    </div>
@endif



@endsection
