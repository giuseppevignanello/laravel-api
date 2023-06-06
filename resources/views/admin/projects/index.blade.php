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
            <div class="table  m-4">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr class="">
                                <td scope="row">{{ $project->title }}</td>
                                <td>{{ $project->description }}</td>
                                <td><a class="btn btn-primary" href="projects/{{ $project->id }}/edit" role="button"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="btn btn-primary" href="projects/{{ $project->id }}/edit" role="button"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>
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
