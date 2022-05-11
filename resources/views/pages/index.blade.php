@inject('isTravel', 'App\Models\Travel')

@extends('layouts.base')

@section('title', 'Travel Shere')

@section('content')
<div class="container w-75">
    <div class="row justify-content-between">
        <div class="left-wrap col-md-4">
            <a href="/create" class="create-banner banner shadow">
                <span class="">旅のしおりを作成する</span>
                <div>
                    <i class="fa-solid fa-file-pen fa-lg"></i>
                </div>
            </a>
            <div class="menu border shadow-sm mb-5">
                <div class="menu-title border">
                    <h4 class="text-center py-3">都道府県別モデルコース</h4>
                </div>
                <div class="menu-items">
                    @foreach ($prefectures as $prefecture)
                    <div class="menu-item d-flex justify-content-between mx-5 my-1 px-2 py-1">
                        <p class="menu-prefecture">
                            <a id="prefecture-btn" href="prefecture?name={{ $prefecture->location_name }}">
                                {{ $prefecture->location_name }}
                            </a>
                        </p>
                        <p class="menu-post">
                            {{ $prefecture->post ?: '0'}}<span>post</span>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="right-wrap col-6">
            <div class="title-tag mb-4 shadow-sm">
                <!-- 後で変更 -->
                <h2 class="h2 text-center py-3 border bg-white">{{ $title_tag }}</h2>
            </div>
            <!-- 後で変更/モデルコースバナー -->
            @foreach ($travels as $travel)
            <div class="model-banner banner mb-4 shadow">
                <div class="model-wrapper">
                    <a href="/view?id={{ $travel->id }}" class="">
                        <div class="model-top">
                            <div class="model-address">
                                <h4 class="text-black">{{ $travel->location_name}}</h4>
                            </div>
                            <div class="model-title">
                                <h4>{{ $travel->title }}</h4>
                            </div>
                        </div>
                        <p class="model-write text-black">メッセージ</p>
                        <div class="model-msg">
                            <p>{!! nl2br(e($travel->message)) !!}</p>
                        </div>
                    </a>
                </div>
                <div class="model-bottom">
                    <div class="model-bottom-left">
                        <div><span class="name">{{ $travel->name }}</span></div>
                        <div><span class="created">{{ $travel->created_at }}</span></div>
                    </div>
                    <!-- いいね -->
                    <div>
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
            @endforeach
            <!--  -->
        </div>
    </div>
</div>
@endsection
