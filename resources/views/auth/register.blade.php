@extends('layouts.base')

@section('title', 'Travel Shereの新規作成ページ')

@section('content')
<x-guest-layout>
    <div class="container">
        <div class="my-5">
            <h1 class="mb-3 text-center">Travel Shereの新規登録</h1>
            <h1 class="text-center">ようこそ、Travel Shereへ</h1>
        </div>
        <x-jet-validation-errors class="mb-4" />
        <form method="POST" action="{{ route('register') }}" class="border w-50 mx-auto py-5 shadow-sm">
            @csrf
            <div class="w-75 mx-auto">
                <div>
                    <x-jet-label for="name" value="{{ __('ユーザーネーム') }}" />
                    <x-jet-input id="name" class="mt-1 w-100" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
                    <x-jet-input id="email" class="mt-1 w-100" type="email" name="email" :value="old('email')" required />
                </div>
                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('パスワード') }}" />
                    <x-jet-input id="password" class="mt-1 w-100" type="password" name="password" required autocomplete="new-password" />
                </div>
                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('パスワード再入力') }}" />
                    <x-jet-input id="password_confirmation" class="mt-1 w-100" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" />
                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
                @endif
                <x-jet-button class="my-5 w-100">
                    {{ __('登録') }}
                </x-jet-button>
                <div class="text-center">
                    <a href="{{ route('login') }}">
                        {{ __('ログインはコチラ') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>
@endsection
