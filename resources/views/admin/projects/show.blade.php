@extends('layouts.admin')

@section('content')
    <div class="show_section">
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $project->title }}</h4>
                        <p class="card-text">{{ $project->description }}</p>
                        <p class="card-text"><strong>Start Date </strong>{{ $project->start_date }} <strong>End Date
                            </strong>
                            {{ $project->end_date }}
                        </p>
                        <p class="card-text"><strong>Duration </strong> {{ $project->duration }} weeks</p>
                        @if ($project->status === 'pending')
                            <p><strong>Status</strong> 🚧</p>
                        @elseif ($project->status === 'completed')
                            <p> <strong>Status</strong> ✅ </p>
                        @endif

                        <p><strong>Repo Link</strong> {{ $project->repo_link }}</p>
                        <p><strong>View Link</strong> {{ $project->view_link }}</p>
                        <p><strong>Type</strong> {{ $project->type?->name }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
