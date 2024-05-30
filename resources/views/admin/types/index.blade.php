@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="{{ route('admin.types.create') }}" class="btn btn-primary my-4">Add new project</a>

        <div class="table-responsive">

            @include('admin.partials.alert-message')

            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Type Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($types as $type)
                        <tr class="">
                            <td scope="row">{{ $type->id }}</td>
                            <td>{{ $type->type_name }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.types.edit', $type) }}"><i
                                        class="fa-solid fa-pen-to-square fa-fw"></i> Edit</a>

                                <!-- Modal trigger button -->
                                <a class="btn btn-danger btn-sm"href="#"
                                    data-bs-toggle="modal"data-bs-target="#modalId-{{ $type->id }}"><i
                                        class="fa-solid fa-trash-can"></i> Delete</a>


                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $type->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $type->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-dark" id="modalTitleId-{{ $type->id }}">
                                                    Delete Type
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-dark">Attention! You are deleting this type,
                                                this action is irreversible. Do you want to continue?</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    back
                                                </button>
                                                <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                            </td>
                        </tr>

                    @empty

                        <tr class="">
                            <td scope="row">Item</td>
                            <td>Item</td>
                            <td>Item</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
