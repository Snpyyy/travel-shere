@extends('layouts.base')

@section('title', '退会確認画面')

@section('content')
<div class="container">
    <div class="mb-5">
        <p class="h3 text-center mb-4">注意! 退会すると今までのデータが全て消えてしまいます</p>
        <p class="h3 text-center">退会しますか？</p>
    </div>
    <div class="w-25 mx-auto">
        <div class="d-flex justify-content-between">
            <a class="border bg-secondary text-white p-1 w-25 text-center" href="/user/mypage">戻る</a>
            <a class="border bg-secondary text-white p-1 text-center" href="/delete-account">退会する</a>
        </div>
    </div>
</div>
@endsection
