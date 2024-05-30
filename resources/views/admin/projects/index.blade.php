@extends('layouts.admin')

@section('content')
    <div class="container projects-index">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary my-4">Add new project</a>
        <div class="table-responsive ">
            
            @include('admin.partials.alert-message')

            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Preview Image</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Type</th>
                        <th>View link</th>
                        <th>Code link</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>
                            <td><img src="{{ asset('storage/' . $project->preview_image) }}" alt=""></td>
                            <td>{{ $project->project_name }}</td>
                            <td>{{ $project->type ? $project->type->type_name : 'null'}}</td>
                            <td><a href="{{ $project->link_view }}">click</a></td>
                            <td><a href="{{ $project->link_code }}">click</a></td>

                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.projects.show', $project) }}"><i
                                        class="fa-solid fa-eye fa-fw"></i> View</a>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.projects.edit', $project) }}"><i
                                        class="fa-solid fa-pen-to-square fa-fw"></i> Edit</a>


                                <!-- Modal trigger button -->
                                <a class="btn btn-danger btn-sm"href="#" data-bs-toggle="modal"data-bs-target="#modalId-{{ $project->id }}"><i
                                        class="fa-solid fa-trash-can"></i> Delete</a>


                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $project->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" id="modalTitleId-{{ $project->id }}">
                                                    Delete Project
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-dark">Attention! You are deleting this project,
                                                this action
                                                irreversible. Do you want to continue?</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    back
                                                </button>
                                                <form action="{{ route('admin.projects.destroy', $project) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>

                    @empty
                        <tr class="">
                            <td scope="row">no record</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
@endsection
