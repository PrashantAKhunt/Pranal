@extends('layouts.master')

@section('content')

<p id="demo" class="counter"></p>


<div class="header-fixed-placeholder"></div>

<div class="container border border-primary bg-secondary mb-2 pb-2">
    <div class="text-center">
        <h2>Download Audio from YouTube</h2>
        <form action="{{ route('download-mp3') }}" method="POST">
            @csrf
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <input type="text" name="link" placeholder="Enter YouTube link here">
            <button type="submit" class="btn btn-primary">Download</button>
        </form>
    </div>
</div>


<div class="container">
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12">
            <h1 class="text-center">Engagement - Kankupagla videos</h1>
        </div>
    </div>
</div>


<div class="container" style="margin-top: 50px;">
    <div class="">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="card m-2 me-0 shadow-md">
                    <div class="d-flex justify-content-between card-body pt-24 p-8">
                        <div class="align-items-center pt-30">
                            <h5 class="card-title text-dark font-24 fw-500 mb-10 text-ellipsis-2">Kanku Pagla</h5>
                        </div>
                        <div class=" justify-content-end">
                            <a href="kankupagla.html"
                                class="btn btn-primary shadow-none px-24 py-14 py-xs-8 fw-600 font-16">
                                View
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                <div class="card m-2 me-0 shadow-md">

                    <div class="d-flex justify-content-between card-body pt-24 p-8">
                        <div class="align-items-center pt-30">
                            <h5 class="card-title text-dark font-24 fw-500 mb-10 text-ellipsis-2">Engagement</h5>
                        </div>
                        <div class=" justify-content-end">
                            <a href="engagement.html"
                                class="btn btn-primary shadow-none px-24 py-14 py-xs-8 fw-600 font-16">
                                View
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
