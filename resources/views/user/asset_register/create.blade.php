@extends('base.layout')

@section('title', 'Create Asset')

@section('content')

@include('navbar.layout')
    <div class="container">
        <h1>Add Asset</h1>

        <form action="{{ route('assets.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="asset_name">Asset Name</label>
                <input type="text" name="asset_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="asset_desc">Asset Description</label>
                <textarea name="asset_desc" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="asset_serial_no">Asset Serial No</label>
                <input type="text" name="asset_serial_no" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="asset_category">Asset Category</label>
                <select name="asset_category" class="form-control" required>
                    <option value="Process">Process</option>
                    <option value="Data & Information">Data & Information</option>
                    <option value="Hardware">Hardware</option>
                    <option value="Software">Software</option>
                    <option value="Service">Service</option>
                    <option value="People">People</option>
                    <option value="Premise">Premise</option>
                </select>
            </div>

            <div class="form-group">
                <label for="asset_qty">Asset Quantity</label>
                <input type="number" name="asset_qty" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="asset_owner">Asset Owner</label>
                <input type="text" name="asset_owner" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="asset_location">Asset Location</label>
                <input type="text" name="asset_location" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
