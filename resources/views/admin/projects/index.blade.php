@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="alert alert-info" role="alert">
            <strong>
                <i class="fa-solid fa-thumbs-up"></i>
            </strong> {{ session('message') }}
        </div>
    @endif
    <div class="admin_index">
        <div class="container">
            <div class="row m-4">
                @forelse ($projects as $project)
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $project->title }}</h4>
                            <p class="card-text">{{ $project->description }}</p>
                            <a class="btn btn-primary" href="projects/{{ $project->id }}/edit" role="button"><i
                                    class="fa-solid fa-pen-to-square"></i></a>

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
