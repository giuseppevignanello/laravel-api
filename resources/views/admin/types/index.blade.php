@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="types_title text-center">Types</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 my-3 g-5">
            @forelse ($types as $type)
                <div class="card border-0">
                    <img src="https://images.unsplash.com/photo-1561154464-82e9adf32764?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60"
                        class="card-img-top" alt="...">
                    <div class="card-body shadow">
                        <h4 class="card-title">{{ $type->name }}</h4>
                    </div>
                </div>
            @empty
                <div>
                    <p> No Types</p>
                </div>
            @endforelse
        </div>


    </div>
@endsection
