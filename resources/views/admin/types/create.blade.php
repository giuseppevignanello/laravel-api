@extends('layouts.admin')

@section('content')
    <div class="edit_form container">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Add New Type</h2>
        <form action="{{ route('admin.types.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid
                
            @enderror"
                    name="name" id="name" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid
                
            @enderror"
                    name="image" id="image" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">Required</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
