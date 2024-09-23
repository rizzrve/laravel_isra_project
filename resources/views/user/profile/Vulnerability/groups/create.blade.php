@extends('base.layout')

@section('content')
    <div class="container">
        <h1>Create New Vulnerability Group</h1>

        <form action="{{ route('vulnerability-groups.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Group Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Group</button>
        </form>
    </div>
@endsection
