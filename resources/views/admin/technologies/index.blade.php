@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="types_title text-center">Technologies</h2>
        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 my-3 g-5">
            @forelse ($technologies as $technology)
                <div class="card border-0">
                    <img src="https://images.unsplash.com/photo-1561154464-82e9adf32764?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60"
                        class="card-img-top" alt="...">
                    <div class="card-body shadow">
                        <h4 class="card-title">{{ $technology->name }}</h4>

                    </div>
                </div>
            @empty
            @endforelse

        </div>

    </div>
@endsection
