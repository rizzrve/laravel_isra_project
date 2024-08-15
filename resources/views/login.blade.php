@extends('base.layout')
@section('title', 'ISRA')
@section('content')
    @include('navbar.layout')

    @if (session('success'))
        <div class="alert alert-success">
            <div class="text-center">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="container align-items-center justify-content-center my-5">
        <div class="container text-center fw-bold fs-2 my-5">
            <p>Information Security Risk Assessment</p>
        </div>
        <div class="container card w-50 rounded-4">
            <form id="loginForm" action="{{ route('login.post') }}" method="POST"> @csrf
                <div class="mx-3">
                    <div class="mb-4 my-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" id="email" />
                        <div class="text-danger">
                            @if ($errors->has('email'))
                                {{ $errors->first('email') }}
                            @endif
                        </div>
                    </div>
                    <div class="mb-4 my-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" id="password" />
                        <div class="text-danger">
                            @if ($errors->has('password'))
                                {{ $errors->first('password') }}
                            @endif
                        </div>
                    </div>
                    <div class="mb-4 my-3">
                        <button class="btn btn-primary " type="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container text-center w-50 my-5">
            <p>No account? <a href="/register">Register</a></p>
            <a href="#!">Forgot password?</a>
        </div>
    </div>
@endsection
