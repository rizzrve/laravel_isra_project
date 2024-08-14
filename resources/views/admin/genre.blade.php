@extends('base.layout')
@section('title', 'ISRA')

@section('content')
    @include('navbar.layout')
    <div>
        <div class="container align-items-center justify-content-center my-5">
            <div class="text-center fw-bold fs-2 my-5">
                <p>Genre</p>
            </div>
            <div class="list-group">
                <a class="list-group-item active text-center fw-bold">Genre</a>
                <a href="/admin/project/rr" class="list-group-item list-group-item-action">Risk Register > </a>
                <a href="/admin/project/ra" class="list-group-item list-group-item-action">Risk Assessment > </a>
                <a href="/admin/project/rtp" class="list-group-item list-group-item-action">Risk Treatment Plan > </a>
                <a href="/admin/pp" class="list-group-item list-group-item-action">Process Profile > </a>
                <a href="/admin/tp" class="list-group-item list-group-item-action">Threats Profile > </a>
                <a href="/admin/vp" class="list-group-item list-group-item-action">Vulerabilities Profile > </a>
                <a href="/admin/project" class="list-group-item list-group-item-action list-group-item-secondary">Projects > </a>
            </div>
        </div>
    </div>
@endsection
