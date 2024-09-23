@extends('base.layout')

@section('title' , 'Create Vulnerability')

@section('content')

@include('navbar.layout')
    <div class="container">
        <h1>Create New Threat</h1>

        <form action="{{ route('threats.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Threat Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="threat_group_id" class="form-label">Threat Group</label>
                <select class="form-control" id="threat_group_id" name="threat_group_id" required>
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
