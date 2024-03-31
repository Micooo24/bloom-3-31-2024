@extends('layouts.style')
@section('content')
<body class="custom-background"> <!-- Applying the custom background color here -->
<div class="logo">
    <a href="{{ url('/') }}">
        <img src="{{ asset('/logo/bloom.png') }}" alt="Logo"width="200" height="200">
    </a>
</div>  
<div class="container">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="input-field" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex-container">
            <a class="link" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>

            <button class="button" type="submit">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</div>
@endsection('content')
</body>
