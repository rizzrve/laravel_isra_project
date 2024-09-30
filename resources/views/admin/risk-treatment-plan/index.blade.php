@extends('base.layout')
@section('title', 'ISRA')

@section('content')

    {{-- NAVBAR --}}
    @include('navbar.layout')

    {{-- TITLE --}}
    <div class="container">
        <div class="align-items-center justify-content-center my-5">
            <div class="container text-center fw-bold fs-2 my-5">
                <p>Risk Treatment Plan</p>
            </div>
        </div>
    </div>

    {{-- CREATE RTP BUTTON --}}
    <div class="container">
        <div class="container d-flex justify-content-end">
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#create-rtp">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </div>

    {{-- RTP TABLE --}}
    <div class="container">
        <div class="container my-5">
            @include('admin.risk-treatment-plan.components.table')
        </div>
    </div>

    {{-- CREATE RTP MODAL --}}
    <div class="modal fade my-5" id="create-rtp" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            @include('admin.risk-treatment-plan.components.create')
        </div>
    </div>

    {{-- EDIT RTP MODAL --}}

@endsection
