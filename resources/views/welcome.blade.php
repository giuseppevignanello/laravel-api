@extends('layouts.app')
@section('content')
    <div class="container py-4">

        <h1 class="text-center py-2"> <strong>Are you sure you should be here </strong></h1>
        <div class="d-flex justify-content-center mb-3">
            <div class="avatar_me bg_header">
                <img src="../../../img/me_api.png" alt="">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6 d-flex flex-column">
                <h3 class="text-center"> <strong> If you are me prove it and sign in </strong></h3>
                <a class="btn btn-light" href="{{ route('login') }}">{{ __('Login') }}</a>
            </div>
            <div class="col-md-6 d-flex flex-column">
                <h3 class="text-center"><strong>If you are a recruiter take a look at my portfolio</strong> </h3>
                <a class="btn btn-light" href="https://giuseppevignanello.com/" role="button">Portfolio</a>
            </div>
        </div>
        <div class="d-flex justify-content-center">

        </div>

    </div>
@endsection
