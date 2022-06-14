@extends('layouts.base')

@section('title', 'Travel Shere')

@section('content')
    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
    <div class="">
        @livewire('profile.update-password-form')
    </div>

    @endif
@endsection
