@extends('layouts.admin')

@section('content')
    <div class="container">

        <h2 class="types_title text-center">Technologies</h2>
        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 my-3 g-5">
            @forelse ($technologies as $technology)
                <div class="card border-0">
                    <img src="{{ asset('storage/' . $technology->image) }}" class="card-img-top" alt="...">
                    <div class="card-body shadow">
                        <h4 class="card-title">{{ $technology->name }}</h4>
                        <p><a class="btn btn-primary" href="technologies/{{ $technology->id }}/edit" role="button"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $technology->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </p>
                        {{-- Modal --}}
                        <div class="modal fade" id="deleteModal-{{ $technology->id }}" tabindex="-1"
                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">Delete Technology</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this Technology?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                        <form action="{{ route('admin.technologies.destroy', $technology->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div>
                    <p> No Technologies</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
