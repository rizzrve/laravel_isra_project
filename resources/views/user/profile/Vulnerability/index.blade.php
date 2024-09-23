@extends('base.layout')

@section('content')

@include('navbar.layout')
<div class="container">
    <h1>Vulnerabilities</h1>

    @foreach($groups as $group)
        <div class="card mb-4">
            <div class="card-header">
                <h3>{{ $group->name }}</h3>
            </div>
            <div class="card-body">
                @if($group->vulnerabilities->isEmpty())
                    <p>No vulnerabilities in this group.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($group->vulnerabilities as $vulnerability)
                                <tr>
                                    <td>{{ $vulnerability->name }}</td>
                                    <td>{{ $vulnerability->description }}</td>
                                    <td>
                                        <!-- Edit and Delete Buttons -->
                                        <a href="{{ route('vulnerabilities.edit', $vulnerability->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('vulnerabilities.destroy', $vulnerability->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this vulnerability?');">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    @endforeach

    <a href="{{ route('vulnerability-groups.create') }}" class="btn btn-primary">Create New Vulnerability Group</a>
    <a href="{{ route('vulnerabilities.create') }}" class="btn btn-secondary">Create New Vulnerability</a>
</div>
@endsection
