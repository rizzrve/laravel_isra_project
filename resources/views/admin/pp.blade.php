@extends('base.layout')
@section('title', 'ISRA')

@section('content')
    @include('navbar.header-admin')
    <div class="container">
        <div class="align-items-center justify-content-center my-5">
            <div class="container text-center fw-bold fs-2 my-5">
                <p>Process Profile</p>
            </div>
            <table class="table table-striped">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Process ID</th>
                        <th scope="col">Process Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($processProfiles as $pp)
                        <tr>
                            <td>{{ $pp->processID }}</td>
                            <td>{{ $pp->processName }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPP">
                Create Process Profile
            </button>
        </div>
    </div>
@endsection

{{-- MODAL --}}
<div class="modal fade my-5" id="createPP" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createPP">Create Process Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.pp.create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="processID" class="form-label fs-6">Process ID</label>
                        <input class="form-control" type="text" id="processID" name="processID">
                    </div>
                    <div class="mb-3">
                        <label for="processName" class="form-label fs-6">Process Name</label>
                        <input class="form-control" type="text" id="processName" name="processName">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
