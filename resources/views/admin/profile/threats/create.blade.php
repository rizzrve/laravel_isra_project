@extends('base.layout')
@section('title', 'Create Threat')

@section('content')

    {{-- NAVBAR --}}
    @include('navbar.layout')

    <h1>Create Threat</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('threats.store') }}" method="POST">
        @csrf
        <label for="threat_name">Threat Name:</label>
        <input type="text" name="threat_name" id="threat_name" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="threat_description" id="threat_description"></textarea>
        <br>
        <button type="submit">Save</button>
    </form>

    <a href="{{ route('admin.profile.threats.index') }}">Back to List</a>

@endsection
