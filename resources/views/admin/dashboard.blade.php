@extends('layouts.admin')

@section('content')
    <div class="container dashboard_home">
        <a class="btn btn-primary btn-lg m-4" href="{{ route('admin.projects.index') }}" role="button">View All Projects</a>
        <a class="btn btn-primary btn-lg m-4" href="{{ route('admin.projects.create') }}" role="button">Create New
            Projects</a>
        <a class="btn btn-primary btn-lg m-4" href="{{ route('admin.types.index') }}" role="button">View All Types</a>
        <a class="btn btn-primary btn-lg m-4" href="{{ route('admin.types.create') }}" role="button">Add New Type</a>
        <a class="btn btn-primary btn-lg m-4" href="{{ route('admin.technologies.index') }}" role="button">View All
            Technologies</a>
    </div>
@endsection
