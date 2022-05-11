@extends('layouts.base')

@section('title', 'Travel Shereのログインページ')

@section('content')
<div class="container">
    <h1 class="my-5 text-center h1">Travel Shereのログインページ</h1>
    <x-jet-validation-errors class="" />
    @if (session('status'))
    <div class="">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="border w-50 mx-auto py-5 shadow-sm">
        @csrf
        <div class="w-75 mx-auto">
            <div>
                <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
                <x-jet-input id="email" class="mt-1 w-100" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="mt-1 w-100" type="password" name="password" required autocomplete="current-password" />
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('ログイン状態を保存する') }}</span>
                </label>
            </div>

            <x-jet-button class="w-100 mt-4">
                {{ __('ログイン') }}
            </x-jet-button>

            <div class="my-4">
                <div class="my-3 text-center">
                    <a href="register" class="">アカウントをまだ持っていない方はコチラ</a>
                </div>
                <!-- <div class="my-3 text-center">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('パスワードを忘れた方はコチラ') }}
                    </a>
                    @endif
                </div> -->
            </div>
        </div>
    </form>
</div>
@endsection
