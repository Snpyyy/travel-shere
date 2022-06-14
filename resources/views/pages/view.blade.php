@inject('isTravel', 'App\Models\Travel')

@extends('layouts.base')

@section('title', '旅のしおり確認画面')

@section('content')
<div class="container mb-5">
    <div class="row">
        <div class="confirm-title">
            <h1 class="h2 text-center">{{ $travel->title }}</h1>
        </div>
        <div class="confirm-sub-title mb-5">
            <h1 class="h4 text-center">{{ $travel->sub_title }}</h1>
        </div>
        <div class="">
            <h2 class="h4 mb-4">旅先： {{ $travel->location_name }}</h2>
        </div>
        <div class="mb-5">
            @foreach($brochures as $day => $bodies)
                <div class="mb-5">
                    <div class="d-flex">
                        <h2 class="h4">{{ $day }}日目</h2>
                    </div>
                    @foreach($bodies as $body)
                        <div class="d-flex w-100 mb-5">
                            <span class="destination me-3">
                                @switch($body['traffic_method'])
                                    @case("")
                                        ・
                                        @break
                                    @default
                                        ・
                                @endswitch
                            </span>
                            <p class="me-3 h5 fw-bold">{{ $body['time']}}</p>
                            <div class="">
                                <div class="h5 fw-bold">{{ $body['title']}}</div>
                                <p class="">{!! nl2br(e($body['body'])) !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-end">
            @auth
                @if($isTravel->isGoodBy(Auth::user(), $travel->id))
                    <span class="goods">
                        <i class="good-toggle good liked fa-solid fa-heart" data-travel-id="{{ $travel->id }}"></i>
                        <span class="good-counter">{{ $isTravel->goodCount($travel->id)}}</span>
                    </span>
                @else
                    <span class="goods">
                        <i class="good-toggle good fa-solid fa-heart" data-travel-id="{{ $travel->id }}"></i>
                        <span class="good-counter">{{ $isTravel->goodCount($travel->id)}}</span>
                    </span>
                @endif
            @endauth
            @guest
            <span class="goods">
                <i class="fa-solid fa-heart"></i>
                <span class="good-counter">{{ $isTravel->goodCount($travel->id)}}</span>
            </span>
            @endguest
        </div>
    </div>
</div>
@endsection
