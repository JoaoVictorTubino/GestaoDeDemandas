@extends('layouts.auth')

@section('title', 'Login')

@section('content')    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
        </div>

        <!-- Remember Me -->
        <div class="mb-3">
            <div class="icheck-primary">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">
                    {{ __('Remember me') }}
                </label>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
                <a class="text-sm" href="{{ route('register') }}">
                    {{ __('Faça seu cadastro!') }}
                </a>
            <button type="submit" class="btn btn-primary">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
@endsection
