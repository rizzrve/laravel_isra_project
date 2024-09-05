@extends('base.layout')
@section('title', 'ISRA')
@section('content')
    @include('navbar.layout')

    @if (session('error'))
        <div class="alert alert-danger">
            <div class="text-center">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <div class="container align-items-center justify-content-center my-5">
        <h2 class="container text-center fw-bold fs-2 my-5">
            <p>Register</p>
        </h2>

        <div class="container card w-50 rounded-4">
            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                <div class="mx-3">
                    
                    <div class="mb-4 my-3">
                        <label class="form-label">Name</label>
                        <input type="name" class="form-control" name="name">
                        @if ($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="mb-4 my-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email">
                        @if ($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="mb-4 my-3">
                        <label class="form-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password">
                        @if ($errors->has('password'))
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div class="mb-4 my-3">
                        <label class="form-label">Confirm password</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                            <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>

                    <div class="mb-4 my-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>

                </div>
            </form>
        </div>
        <div class="container text-center w-50 my-4">
            <p>Have an account? <a href="/login">Login</a></p>
        </div>
    </div>
@endsection
