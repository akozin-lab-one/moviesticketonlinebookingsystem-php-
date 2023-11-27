@extends('layouts.app')

@section('title', 'LoginPage')

@section('mainContent')
    <div class="container">
        <div class="grid place-items-center h-screen">
            <div class="bg-green-300 rounded-lg w-[30%] p-4">
                <h2 class="font-extrabold text-center">Sign In</h2>
                <form  method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-button class="ms-4">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                    <div class="flex items-center justify-end mt-2">
                        <p class="text-xs text-gray">Don't you have an account? </p>
                        <a class="ml-2 " href="{{route('Auth#register')}}">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
