<!-- In your Blade view file (e.g., index.blade.php) -->
@extends('base.layout')

@section('title', 'Threats List')

@section('content')


    {{-- NAVBAR --}}
    @include('navbar.layout')
    
    <div class="container mt-4">
        <h1>Threats List</h1>
        <a href="{{ route('threats.create') }}" class="btn btn-primary mb-3">Create New Threat</a>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Threat ID</th>
                    <th>Threat Name</th>
                    <th>Threat Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($threats as $threat)
                    <tr>
                        <td>{{ $threat->threat_id }}</td>
                        <td>{{ $threat->threat_name }}</td>
                        <td>{{ $threat->threat_description }}</td>
                        <td>
                            <a href="{{ route('admin.profile.threats.edit', $threat->threat_id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.profile.threats.destroy', $threat->threat_id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
