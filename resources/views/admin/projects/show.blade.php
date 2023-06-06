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
                        <p>{{ $project->status }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
