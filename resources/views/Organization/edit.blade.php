@extends('base.layout')
@section('title', 'Edit Organization')

<!DOCTYPE html>
<html lang="en">
<head>
    @include('navbar.layout')
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Organization</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Organization</h1>

        <form action="{{ route('organizations.update', $organization->org_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="org_name">Organization Name:</label>
                <input type="text" name="org_name" id="org_name" value="{{ $organization->org_name }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="org_logo">Logo:</label>
                @if ($organization->org_logo)
                    <img src="{{ asset('storage/' . $organization->org_logo) }}" alt="Logo" width="100">
                @endif
                <input type="file" name="org_logo" id="org_logo" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
