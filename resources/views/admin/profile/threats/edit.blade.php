<!-- resources/views/user/profile/threats/edit.blade.php -->
@extends('base.layout')

@section('title', 'Edit Threat')

@section('content')
    <h1>Edit Threat</h1>
    <form action="{{ route('admin.profile.threats.update', $threat->threat_id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Threat Name -->
        <div class="form-group">
            <label for="threat_name">Threat Name:</label>
            <input type="text" name="threat_name" id="threat_name" class="form-control" value="{{ $threat->threat_name }}" required>
        </div>

        <!-- Threat Description -->
        <div class="form-group">
            <label for="threat_description">Threat Description:</label>
            <textarea name="threat_description" id="threat_description" class="form-control" required>{{ $threat->threat_description }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Threat</button>
    </form>

    <a href="{{ route('admin.profile.threats.index') }}">Back to List</a>
@endsection
