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
        <h1>Edit</h1>
        <form action="{{ route('admin.projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    value="{{ $project->title }}">
                <small id="title" class="form-text text-muted">Required field</small>
            </div>
            <div>
                <img style="width: 80px" src="{{ asset('storage/' . $project->image) }}" alt="">
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                        id="image">
                </div>
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Types</label>
                <select class="form-select @error('type_id') is-invalid @enderror" name=" type_id" id="type_id">
                    <option value="">Select a type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ $type->id == old('type_id', $project->type?->id) ? 'selected' : '' }}>{{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class='form-group'>
                <p>Select the technologies:</p>
                @foreach ($technologies as $technology)
                    <div class="form-check @error('technologies') is-invalid @enderror">
                        <label class='form-check-label'>
                            @if ($errors->any())
                                <input name="technologies[]" type="checkbox" value="{{ $technology->id }}"
                                    class="form-check-input"
                                    {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                            @else
                                <input name='technologies[]' type='checkbox' value='{{ $technology->id }}'
                                    class='form-check-input'
                                    {{ $project->technologies->contains($technology) ? 'checked' : '' }}>
                            @endif
                            {{ $technology->name }}
                        </label>
                    </div>
                @endforeach
                @error('technologies')
                    <div class='invalid-feedback'>{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description"
                    value="
                    {{ $project->description }}">
            </div>
            <div class="mb-3">
                <label for="repo_link" class="form-label">Repo link</label>
                <input type="text" class="form-control" name="repo_link" id="repo_link"
                    value="
                    {{ $project->repo_link }}">
            </div>
            <div class="mb-3">
                <label for="view_link" class="form-label">View link</label>
                <input type="text" class="form-control" name="view_link" id="view_link"
                    value="
                    {{ $project->view_link }}">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select form-select-lg" name="status" id="status">
                    <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration</label>
                <input type="number" step="1" class="form-control" name="duration" id="duration"
                    {{ $project->duration }}>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" name="start_date" id="start_date"{{ $project->start_date }}
                    value="{{ $project->start_date }}">
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" name="end_date" id="end_date"{{ $project->end_date }}
                    value="{{ $project->start_date }}">
            </div>
            <div class="mb-3">
                <label for="is_evidence" class="form-label">Is Evidence?</label>
                <input type="checkbox" class="form-check-input" name="isEvidence" id="is_evidence"
                    {{ old('isEvidence') ? 'checked' : '' }}>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>

    </div>
@endsection
