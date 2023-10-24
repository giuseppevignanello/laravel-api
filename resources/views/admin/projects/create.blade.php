@extends('layouts.admin')

@section('content')
    <div class="container edit_form">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Create New Project</h1>
        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    value="{{ old('title') }}">
                <small id="title" class="form-text text-muted">Required field</small>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image">
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Types</label>
                <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id', '') ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <p>Select the technologies</p>
                @foreach ($technologies as $technology)
                    <div class="form-check @error('technologies') is-invalid @enderror">

                        <label class="form-check-label">
                            <input name="technologies[]" type="checkbox" value="{{ $technology->id }}"
                                class="form-check-input"
                                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                            {{ $technology->name }}
                        </label>
                    </div>
                @endforeach

                @error('technologies')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description"{{ old('description') }}>
            </div>
            <div class="mb-3">
                <label for="repo_link" class="form-label">Repo Link</label>
                <input type="text" class="form-control" name="repo_link" id="repo_link"{{ old('repo_link') }}>
            </div>
            <div class="mb-3">
                <label for="view_link" class="form-label">View Link</label>
                <input type="text" class="form-control" name="view_link" id="view_link"{{ old('view_link') }}>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select form-select-lg" name="status" id="status">
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration</label>
                <input type="number" step="1" class="form-control" name="duration" id="duration"
                    {{ old('duration') }}>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" name="start_date" id="start_date"{{ old('start_date') }}>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" name="end_date" id="end_date"{{ old('end_date') }}>
            </div>
            <div class="mb-3">
                <label for="is_evidence" class="form-label">Is Evidence?</label>
                 <input type="checkbox" class="form-check-input" name="isEvidence" id="is_evidence" {{ old('isEvidence') ? 'checked' : '' }}>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>

    </div>
@endsection
