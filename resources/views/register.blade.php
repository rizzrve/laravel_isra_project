@extends('base.layout')
@section('title', 'ISRA')
@section('content')
    @include('navbar.layout')
    <div class="container">
        @include('misc.br')
        <h2 class="text-center">
            <b>
                Information Security Risk Assessment
            </b>
        </h2>
        @include('misc.br')
        <form action="{{ route('register.post') }}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">

                @if ($errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif

            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                @endif

            </div>
            <div class="mb-3">
                <label class="form-label">Confirm password</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">

                @if ($errors->has('password_confirmation'))
                    <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                @endif

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            @include('misc.br')
            <div class="text-center">
                <p>Have an account? <a href="/login">Login</a></p>
            </div>
        </form>
    </div>
@endsection
