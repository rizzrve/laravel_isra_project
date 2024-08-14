@extends('base.layout')
@section('title', 'ISRA')

@section('content')
    @include('navbar.header-admin')
    <div class="container">
        <div class="align-items-center justify-content-center my-5">
            <div class="container text-center fw-bold fs-2 my-5">
                <p>Threat Profile</p>
            </div>
            <div class="table-responsive" style="height: 350px; overflow-y:auto;">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($threatProfiles as $tp)
                            <tr>
                                <td>{{ $tp->threatType }}</td>
                                <td>{{ $tp->threatDescription }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTP">
                Create Threat Profile
            </button>
        </div>
    </div>
@endsection

{{-- MODAL --}}
<div class="modal fade my-5" id="createTP" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createTP">Create Threat Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.tp.create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="threatType" class="form-label fs-6">Threat Type</label>
                        <input class="form-control" type="text" id="threatType" name="threatType">
                    </div>
                    <div class="mb-3">
                        <label for="threatDescription" class="form-label fs-6">Threat Description</label>
                        <textarea class="form-control" type="text" row="10" id="threatDescription" name="threatDescription"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
