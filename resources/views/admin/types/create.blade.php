@extends('layouts.admin')

@section('content')
    <div class="container">
        <a class="btn btn-secondary" href="{{ route('admin.types.index') }}">BACK</a>
        @include('admin.partials.validation-errors')

        <form class="py-4" action="{{ route('admin.types.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="type_name" class="form-label text-white">Type Name</label>
                <input type="text" class="form-control @error('type_name') is-invalid @enderror" name="type_name"
                    id="type_name" aria-describedby="helpId" placeholder="" value="{{ old('type_name') }}"/>

            </div>
            <button type="submit" class="btn btn-primary">
                Create
            </button>

        </form>

    </div>
@endsection
