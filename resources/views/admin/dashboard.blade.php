@extends('layouts.admin')

@section('content')
    <div class="container">
        <a class="btn btn-primary btn-lg m-4" href="{{ route('admin.projects.index') }}" role="button">View All Projects</a>
        <a class="btn btn-primary btn-lg m-4" href="{{ route('admin.projects.create') }}" role="button">Create New
            Projects</a>
    </div>
@endsection
