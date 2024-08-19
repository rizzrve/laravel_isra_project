@extends('base.layout')
@section('title', 'ISRA')

@section('content')

    {{-- NAVBAR --}}
    @include('navbar.layout')

    {{-- TITLE --}}
    <div class="container border border-danger">
        <div class="align-items-center justify-content-center my-5">
            <div class="container text-center fw-bold fs-2 my-5">
                <p>Project Listings</p>
            </div>
        </div>
    </div>

    {{-- CREATE PROJECT BUTTON --}}
    <div class="container border border-danger">
        <div class="container d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-project">
                Create Project
            </button>
        </div>
    </div>

    {{-- CREATE PROJECT MODAL --}}
    <div class="modal fade my-5" id="create-project" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="create-project">Create Project</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.projects.create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="projectTitle" class="form-label fs-6">Title</label>
                            <input class="form-control" type="text" id="projectTitle" name="projectTitle">
                        </div>
                        <div class="mb-3">
                            <label for="projectDescription" class="form-label fs-6">Description</label>
                            <input class="form-control" type="text" id="projectDescription" name="projectDescription">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- PROJECT LISTING TABLE --}}
    <div class="container border border-danger">
        <div class="container my-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Project ID</th>
                        <th scope="col">Project</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $prj)
                        <tr>
                            <td>{{ $prj->projectID }}</td>
                            <td>{{ $prj->projectTitle }}</td>
                            <td>{{ $prj->projectDescription }}</td>
                            <td>
                                {{-- <a href="{{ route('', $prj->projectID) }}" class="btn btn-primary">View</a> --}}
                                <a href="" class="btn btn-primary">View</a>
                                <a href="" class="btn btn-primary">Edit</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
