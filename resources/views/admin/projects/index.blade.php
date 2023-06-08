@extends('layouts.admin')

@section('content')
    <div class="admin_index">
        @if (session('message'))
            <div class="alert alert-info" role="alert">
                <strong>
                    <i class="fa-solid fa-thumbs-up"></i>
                </strong> {{ session('message') }}
            </div>
        @endif
        <div class="container">
            <div class="table mt-4 admin_table">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Type</th>
                            <th scope="col">Technologies</th>
                            <th scope="col">Status</th>
                            <th scope="col">Repo Link</th>
                            <th scope="col">View Link</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr class="">
                                <td scope="row">{{ $project->title }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->type?->name }}</td>
                                <td>
                                    @foreach ($project->technologies as $technology)
                                        {{ $technology->name }}
                                    @endforeach
                                </td>
                                @if ($project->status === 'pending')
                                    <td>🚧</td>
                                @elseif ($project->status === 'completed')
                                    <td> ✅ </td>
                                @endif
                                <td><a href="{{ $project->repo_link }}"> {{ $project->repo_link }} </a></td>
                                <td><a href="{{ $project->view_link }}"> {{ $project->view_link }} </a></td>
                                <td><a class="btn btn-primary" href="projects/{{ $project->id }}" role="button"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <a class="btn btn-primary" href="projects/{{ $project->id }}/edit" role="button"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal-{{ $project->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            {{-- Modal --}}
                            <div class="modal fade" id="deleteModal-{{ $project->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">Delete Project</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this projects?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">No</button>
                                            <form action="{{ route('admin.projects.destroy', $project->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <div>
                                <p>
                                    There Aren't Projects
                                </p>
                            </div>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
