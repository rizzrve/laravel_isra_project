
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
                    <th>Title</th>
                    <th>Logo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($organizations as $organizations)
                    <tr>
                        <td>{{ $organizations->org_name }}</td>
                        <td>
                            @if ($organizations->logo)
                                <img src="{{ asset('storage/' . $organizations->org_logo) }}" alt="Logo" width="100">
                            @endif
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
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" required>
                </div>
                <div>
                    <label for="logo">Logo:</label>
                    <input type="file" name="logo" id="logo">
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
