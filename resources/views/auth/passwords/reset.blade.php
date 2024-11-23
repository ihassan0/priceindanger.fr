{{-- @extends('layouts.app')

@section('content') --}}
<div class="container">
    <h1>Reset Password</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control"
                id="email">
        </div>

        <div class="mb-3">
            <label for="password">New Password</label>
            <input type="password" name="password" required class="form-control" id="password">
        </div>

        <div class="mb-3">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" required class="form-control"
                id="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
</div>
{{-- @endsection --}}
