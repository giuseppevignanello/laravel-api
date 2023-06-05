@extends('layouts.admin')

@section('content')
    <div class="admin_index">
        <div class="container">
            <div class="row m-4">
                @forelse ($projects as $project)
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $project->title }}</h4>
                            <p class="card-text">{{ $project->description }}</p>
                        </div>
                    </div>
                @empty
                    <div>
                        <p>
                            There Aren't Projects
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
