@extends('layouts.admin')

@section('content')
    <div class="container">

        <h2 class="types_title text-center">{{ $type->name }} Projects</h2>
        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 my-3 my-3 my-3 g-5">
            @forelse ($projects as $project)
                <div class="card border-0">
                    <img src="https://images.unsplash.com/photo-1561154464-82e9adf32764?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60"
                        class="card-img-top" alt="...">
                    <div class="card-body shadow">
                        <h4 class="card-title">{{ $project->title }}</h4>
                        <p class="card-text">{{ $project->description }}</p>
                    </div>
                @empty
                    <div>
                        <p> No Projects</p>
                    </div>
            @endforelse
        </div>


    </div>
@endsection
