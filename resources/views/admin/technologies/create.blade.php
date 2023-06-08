@extends('layouts.admin')

@section('content')
    <div class="edit_form contianer">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Add New Technology</h2>
        <form action="{{ route('admin.technologies.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid
                
            @enderror"
                    name="name" id="name" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">Required</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
