@extends('base.layout')

@section('content')

@include('navbar.layout')

<div class="container">
    <h1>Edit Threat</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('threats.update', $threat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Threat Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $threat->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $threat->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="threat_group_id">Threat Group</label>
            <select class="form-control" id="threat_group_id" name="threat_group_id" required>
                <option value="">Select a group</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}" {{ $group->id == $threat->threat_group_id ? 'selected' : '' }}>
                        {{ $group->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Threat</button>
    </form>
</div>

@endsection
