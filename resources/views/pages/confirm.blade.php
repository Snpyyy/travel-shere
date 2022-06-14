@extends('layouts.base')

@section('title', '旅のしおり確認画面')

@section('content')
<div class="container mb-5">
    <div class="row">
        <div class="confirm-title">
            <h1 class="h2 text-center">{{ $guideTitle }}</h1>
        </div>
        <div class="confirm-sub-title mb-5">
            <h1 class="h4 text-center">{{ $guideSubTitle }}</h1>
        </div>
        <div class="">
            <h2 class="h4 mb-4">旅先： {{ $prefecture }}</h2>
            @foreach($notes as $title => $body)
            <div class="mb-5">
                <h2 class="h4">{{ $title }}</h2>
                <ui>
                    <li>{!! nl2br(e($body)) !!}</li>
                </ui>
            </div>
            @endforeach
        </div>
        <div class="mb-5">
            @foreach($days as $day => $bodies)
                <div class="mb-5">
                    <div class="d-flex">
                        <h2 class="h4">{{ $day }}日目( {{$dates[$day - 1]}} )</h2>
                    </div>
                    @foreach($bodies as $body)
                        <div class="d-flex w-100 mb-5 bg-light py-2">
                            <span class="destination me-3">
                                @switch($body['destination'])
                                    @case("")
                                        ・
                                        @break
                                    @default
                                        ・
                                @endswitch
                            </span>
                            <p class="me-3 h5 fw-bold">{{ $body['time']}}</p>
                            <div class="">
                                <div class="h5 fw-bold">{{ $body['bodyTitle']}}</div>
                                <p class="">{!! nl2br(e($body['bodyDetail'])) !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="">
            @if (Auth::check())
                <div class="text-center mb-5">
                    <a href="/create" class="btn text-primary border">編集する</a>
                </div>
                <form action="/complete" method="POST" class="text-center">
                    @csrf
                    <div class="mb-3">
                        <textarea class="w-50 " name="message" rows="5" placeholder="メッセージ"></textarea>
                    </div>
                    <button type="submit" name="isPublic" value="1"  class="me-3">公開しない</button>
                    <button type="submit" name="isPublic" value="0">公開する</button>
                </form>
            @else
                <div class="text-center">
                    <div class="">
                        <p class="text-center mb-3">共有する</p>
                        <div class="w-75 mx-auto d-flex justify-content-center mb-5">
                            <input type="text" value="" class="copyURL w-50" readonly>
                            <button id="copyButton"><i class="fa-solid fa-copy"></i></button>
                        </div>
                    </div>
                    <a href="/create" class="btn text-primary border">編集する</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
