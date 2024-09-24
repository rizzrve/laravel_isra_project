@extends('base.layout')

@section('content')
    <div class="container">
        <h1>Edit Vulnerability</h1>

        <form action="{{ route('vulnerabilities.update', $vulnerability->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Vulnerability Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $vulnerability->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $vulnerability->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="vulnerability_group_id" class="form-label">Vulnerability Group</label>
                <select class="form-control" id="vulnerability_group_id" name="vulnerability_group_id" required>
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}" {{ $group->id == $vulnerability->vulnerability_group_id ? 'selected' : '' }}>
                            {{ $group->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
