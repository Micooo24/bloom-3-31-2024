@extends('layouts.style')
@section('content')
<body class="custom-background">   
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('/logo/bloom.png') }}" alt="Logo"width="200" height="200">
            </a>
        </div>
   
    <div class="container">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mt-4">
                <label for="name" class="input-label">{{ __('Name') }}</label>
                <input id="name" class="input-field" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                <!-- Error message display here -->
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="input-label">{{ __('Email') }}</label>
                <input id="email" class="input-field" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                <!-- Error message display here -->
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="input-label">{{ __('Password') }}</label>
                <input id="password" class="input-field" type="password" name="password" required autocomplete="new-password" />
                <!-- Error message display here -->
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="input-label">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" class="input-field" type="password" name="password_confirmation" required autocomplete="new-password" />
                <!-- Error message display here -->
            </div>

            <div class="flex-container mt-4">
                <a class="link" href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                <button type="submit" class="button ms-4">{{ __('Register') }}</button>
            </div>
        </form>
    </div>
    @endsection
</body>