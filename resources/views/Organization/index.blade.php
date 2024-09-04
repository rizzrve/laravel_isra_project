@extends('base.layout')
@section('title', 'ISRA')

<!DOCTYPE html>
<html lang="en">
<head>
    @include('navbar.layout')
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizations</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Organizations</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Organization Name</th>
                    <th>Logo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($organizations as $organization)
                    <tr>
                        <td>{{ $organization->org_name }}</td>
                        <td>
                            @if ($organization->org_logo)
                            <img src="{{ asset('storage/' . $organization->org_logo) }}" alt="Logo" width="100">

                            @else
                                No Logo
                            @endif
                        </td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('organizations.edit', $organization->org_id) }}" class="btn btn-warning">Edit</a>

                             <!-- Delete Button -->
                            <form action="{{ route('organizations.destroy', $organization->org_id) }}" method="POST" style="display:inline;">
                             @csrf
                             @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this organization?')">Delete</button>
                            </form>
                        </td>

                        
                        
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Button to open the modal -->
        <button type="button" class="btn btn-primary" onclick="openModal()">Add Organization</button>

        <!-- Modal -->
        <div id="organizationModal" style="display:none;">
            <form action="{{ route('organizations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="org_name">Title:</label>
                    <input type="text" name="org_name" id="org_name" required>
                </div>
                <div>
                    <label for="org_logo">Logo:</label>
                    <input type="file" name="org_logo" id="org_logo">
                </div>
                <button type="submit">Add</button>
                <button type="button" onclick="closeModal()">Close</button>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('organizationModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('organizationModal').style.display = 'none';
        }
    </script>
</body>
</html>
