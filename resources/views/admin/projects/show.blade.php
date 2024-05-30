@extends('layouts.admin')
@section('content')
    <div class="container py-4 project-show">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary"><strong>Back</strong></a>
        <a class="btn btn-warning " href="{{ route('admin.projects.edit', $project) }}"><i
                class="fa-solid fa-pen-to-square fa-fw"></i> <strong>Edit</strong></a>
        <a class="btn btn-danger"href="#" data-bs-toggle="modal"data-bs-target="#modalId-{{ $project->id }}"><i
                class="fa-solid fa-trash-can"></i> <strong>Delete</strong></a>


        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1" data-bs-backdrop="static"
            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="modalTitleId-{{ $project->id }}">
                            Delete Project
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">Attention! You are deleting this character,
                        this action
                        irreversible. Do you want to continue?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            back
                        </button>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div class="row row-cols-2 d-flex">
            <div class="col d-flex justify-content-between">
                <div class="card">

                    <img src="{{ asset('storage/' . $project->preview_image) }}" alt="">


                </div>
            </div>

            <div class="col content d-flex">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">{{ $project->project_name }}</h1>
                        <p><strong>Descrizione: </strong>{{ $project->description }}</p>
                        @if ($project->type)
                            <p><strong>Tipo:</strong> {{ $project->type->type_name }}</p>
                        @endif

                        <p><strong>Technologies:</strong>
                            @foreach ($project->technologies as $technology)
                                {{ $technology->name }}
                            @endforeach
                        </p>
                        <p><a href="{{ $project->link_view }}">Link view</a></p>
                        <p><a href="{{ $project->link_code }}">Link code</a></p>
                    </div>



                </div>
            </div>

        </div>

    </div>
@endsection
