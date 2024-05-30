@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row row-cols-2">
            <div class="col">
                @include('admin.partials.validation-errors')

                <form action="{{ route('admin.technologies.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-white">Add new Technology</label>
                        <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name"
                            id="name" aria-describedby="helpId" placeholder="" value="{{ old('name') }}" />
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>

                </form>

            </div>

            <div class="col ">
                @include('admin.partials.validation-errors')

                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Technology</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Count</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($technologies as $technology)
                                <tr class="">
                                    <td scope="row">{{ $technology->id }}</td>

                                    <td>
                                        <form action="{{ route('admin.technologies.update', $technology) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">

                                                <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name"
                                                    id="name" aria-describedby="helpId"
                                                    value="{{ old('name', $technology->name) }}" />
                                            </div>
                                        </form>
                                    </td>
                                    <td>{{ $technology->slug }}</td>
                                    <td>
                                        @foreach ($projectCount as $project)
                                            @if ($project->id == $technology->id)
                                                {{ $project->projects_count }}
                                            @endif
                                        @endforeach

                                    </td>
                                    <td>

                                        <!-- Modal trigger button -->
                                        <a class="btn btn-danger btn-sm"href="#"
                                            data-bs-toggle="modal"data-bs-target="#modalId-{{ $technology->id }}"><i
                                                class="fa-solid fa-trash-can"></i> Delete</a>


                                        <!-- Modal Body -->
                                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                        <div class="modal fade" id="modalId-{{ $technology->id }}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                            aria-labelledby="modalTitleId-{{ $technology->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-dark"
                                                            id="modalTitleId-{{ $technology->id }}">
                                                            Delete Type
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-dark">Attention! You are deleting this
                                                        technology,
                                                        this action is irreversible. Do you want to continue?</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            back
                                                        </button>
                                                        <form
                                                            action="{{ route('admin.technologies.destroy', $technology) }}"
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

                                <td scope="row">No records</td>
                            @endforelse
                            <tr class="">

                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection
