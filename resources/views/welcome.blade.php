@extends('layouts.header')
@section('content')




<style> 
.btn {
    font-weight: 600;
    background-color: white;
    padding: 8px 16px;
    border: 2px solid transparent;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease;
}
.header{
    right: 500px;
}
</style>

@if (Route::has('login'))
    <div class="header">
        @auth
            <a href="{{ url('/home') }}" class="btn">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn">Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn ml-4">Register</a>
            @endif
        @endauth
    </div>
@endif

@endsection
