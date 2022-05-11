@inject('isTravel', 'App\Models\Travel')

@extends('layouts.base')

@section('title', 'マイページ')

@section('content')
<div class="container">
    <div class="card w-75 mx-auto rounded-2 mb-5 shadow">
        <div class="card-header shadow-sm">アカウント情報</div>
        <div class="card-body">
            <div class="w-50 mb-4">
                <div class="d-flex justify-content-between border-bottom mb-2">
                    <p class="">ユーザー名</p>
                    <p>{{ Auth::user()->name }}</p>
                </div>
                <div class="d-flex justify-content-between border-bottom mb-2">
                    <p class="">メールアドレス</p>
                    <p>{{ Auth::user()->email }}</p>
                </div>
                <div class="d-flex justify-content-between border-bottom mb-2">
                    <p class="">投稿数</p>
                    <p class="post-count">{{ $post_count }}</p>
                </div>
            </div>
        </div>
        <div class="card-nav border py-2 rounded-3">
            <div class="d-flex justify-content-end">
                <a class="block border p-1 me-3 rounded-2 bg-secondary text-white" href="mypage/update-password">パスワードを変更する</a>
                <a class="block border p-1 me-3 rounded-2 bg-secondary text-white" href="mypage/delete-account">退会する</a>
            </div>
        </div>
    </div>
    <div class="border-bottom mb-5">
        <div id="select" class="w-100 d-flex justify-content-evenly shadow-sm">
            <div id="past-create" class="w-50 text-center btn border-end selected">
                <span class="">過去に作成した旅のしおり</span>
            </div>
            <div id="favorite-list" class="w-50 text-center btn">
                <span class="">いいね一覧</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="mypage-wrapper w-50 mx-auto">
            <div id="my-brochures" class="section">
                @foreach($my_brochures as $my_brochure)
                <div class="model-banner banner shadow mb-4">
                    <div class="model-wrapper">
                        <a href="/view?id={{ $my_brochure->id }}" class="">
                            <div class="model-top">
                                <div class="model-address">
                                    <h4 class="text-black">{{ $my_brochure->location_name}}</h4>
                                </div>
                                <div class="model-title">
                                    <h4>{{ $my_brochure->title }}</h4>
                                </div>
                            </div>
                            <p class="model-write text-black">メッセージ</p>
                            <div class="model-msg">
                                <p>{!! nl2br(e($my_brochure->message)) !!}</p>
                            </div>
                        </a>
                    </div>
                    <div class="model-bottom">
                        <div class="model-bottom-left">
                            <div><span class="name">{{ $my_brochure->name }}</span></div>
                            <div><span class="created">{{ $my_brochure->created_at }}</span></div>
                        </div>
                        <div class="model-bottom-right">
                            <a href="mypage/release_flg?id={{ $my_brochure->id }}" class="">{{ $my_brochure->release_flg == 0 ? '公開中' : '公開する' }}</a>
                        </div>
                    </div>
                    <span class="delete-box">
                        <i class="fa-solid fa-circle-xmark delete-btn" data-travel-id="{{ $my_brochure->id }}"></i>
                    </span>
                </div>
                @endforeach
            </div>
            <div id="my-favorite" class="section">
                @foreach($good_brochures as $gd_brochure)
                <div class="model-banner banner shadow mb-4">
                    <div class="model-wrapper">
                        <a href="/view?id={{ $gd_brochure->id }}" class="">
                            <div class="model-top">
                                <div class="model-address">
                                    <h4 class="text-black">{{ $gd_brochure->location_name}}</h4>
                                </div>
                                <div class="model-title">
                                    <h4>{{ $gd_brochure->title }}</h4>
                                </div>
                            </div>
                            <p class="model-write text-black">メッセージ</p>
                            <div class="model-msg">
                                <p>{!! nl2br(e($gd_brochure->message)) !!}</p>
                            </div>
                        </a>
                    </div>
                    <div class="model-bottom">
                        <div class="model-bottom-left">
                            <div><span class="name">{{ $gd_brochure->name }}</span></div>
                            <div><span class="created">{{ $gd_brochure->created_at }}</span></div>
                        </div>
                        <div class="model-bottom-right">
                            @if($isTravel->isGoodBy(Auth::user(), $gd_brochure->id))
                            <span class="goods">
                                <i class="good-toggle good liked fa-solid fa-heart" data-travel-id="{{ $gd_brochure->id }}"></i>
                                <span class="good-counter">{{ $isTravel->goodCount($gd_brochure->id)}}</span>
                            </span>
                            @else
                            <span class="goods">
                                <i class="good-toggle good fa-solid fa-heart" data-travel-id="{{ $gd_brochure->id }}"></i>
                                <span class="good-counter">{{ $isTravel->goodCount($gd_brochure->id)}}</span>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
