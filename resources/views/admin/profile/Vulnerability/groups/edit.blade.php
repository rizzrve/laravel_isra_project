@extends('base.layout')

@section('content')
    <div class="container">
        <h1>Edit Vulnerability Group</h1>

        <form action="{{ route('vulnerability-groups.update', $group->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Group Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $group->name }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Group</button>
        </form>
    </div>
@endsection
