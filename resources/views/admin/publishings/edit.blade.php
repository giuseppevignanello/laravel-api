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
        <h2>Add New Publishing Project</h2>
        <form action="{{ route('admin.publishings.update', $publishing->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid
                
            @enderror"
                    name="name" id="name" aria-describedby="helpId" placeholder="" value="{{ $publishing->name }}">
                <small id="helpId" class="form-text text-muted">Required</small>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">location</label>
                <input type="text"
                    class="form-control @error('location') is-invalid
                
            @enderror"
                    name="location" id="location" aria-describedby="helpId" placeholder=""
                    value="{{ $publishing->location }}">
                <small id="helpId" class="form-text text-muted">Required</small>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">type</label>
                <input type="text" class="form-control @error('type') is-invalid
                
            @enderror"
                    name="type" id="type" aria-describedby="helpId" placeholder="" value="{{ $publishing->type }}">
                <small id="helpId" class="form-text text-muted">Required</small>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Start Date</label>
                <input type="date"
                    class="form-control @error('start_date') is-invalid
                
            @enderror"
                    name="start_date" id="start_date" aria-describedby="helpId" placeholder=""
                    value="{{ $publishing->start_date }}">
                <small id="helpId" class="form-text text-muted">Required</small>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid
                
            @enderror"
                    name="image" id="image" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="text"
                    class="form-control @error('website') is-invalid
                
            @enderror" name="website"
                    id="website" aria-describedby="helpId" placeholder="" value="{{ $publishing->website }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
