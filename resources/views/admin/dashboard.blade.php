@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary py-4">
            {{ __('Dashboard') }}
        </h2>

        
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>Hi Simone!</div>

                        <a class="btn btn-dark my-4" href="{{ route('admin.projects.index') }}">My Projects</a>
                        <a class="btn btn-dark my-4" href="{{ route('admin.types.index') }}">Type of project</a>
                        <a class="btn btn-dark my-4" href="{{ route('admin.technologies.index') }}">Technologies</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
