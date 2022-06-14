@extends('layouts.base')

@section('title', '旅のしおりの作成')

@section('content')

<!-- エラー回避 -->
@php
if(!isset($results)){
    $guideTitle['title'] = '';
    $guideTitle['sub-title'] = '';
    $notes[] = [
        'note-title' => '',
        'note-body' => '',
        ];
    $dates = [0 => date('Y-m-d')];
    $days = [
        1 => [
            0 => [
                'time' => '',
                'bodyTitle' => '',
                'bodyDetail' => '',
                ],
            ],
        ];
    $maxDay = 1;
}
@endphp
<div class="container w-50 mb-5">
    <div class="row">
        <form action="confirm" method="GET">
            <div class="title-top mb-3 shadow-sm">
                <input type="text" name="guide-title" class="w-100" placeholder="タイトル" value="{{ $guideTitle['title'] }}">
            </div>
            <div class="title-bottom mb-5 shadow-sm">
                <input type="text" name="guide-sub-title" class="w-100" placeholder="サブタイトル" value="{{ $guideTitle['sub-title'] }}">
            </div>
            @foreach($notes as $note)
                <div class="guide-note box border px-2 py-2 mb-3 shadow-sm">
                    <input type="text" name="note-title[]" class="w-100 mb-2" placeholder="タイトル(例 持ち物)" value="{{ $note['note-title'] }}">
                    <textarea name="note-body[]" class="w-100" rows="" placeholder="内容(例 スマホ・・・)">{{ $note['note-body'] }}</textarea>
                </div>
            @endforeach
            <div class="text-center">
                <span class="note-add addBtn"></span>
            </div>
            @php $today = 1; @endphp
            @foreach($days as $day => $bodies)
                <div>
                    <h2 class="my-4">
                        <input type="date" name="date[]" class="col-3" value="{{$dates[$day-1]}}">
                        @if($loop->iteration == 1)
                            <select name="prefecture" id="prefecture" class="col-2">
                                @foreach($destinations as $destination)
                                    <option value="{{ $destination->location_name }}">{{ $destination->location_name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </h2>
                    @foreach($bodies as $body)
                        <div class="guide-body box shadow-sm">
                            <div class="guide-wrapper">
                                <div class="body-left">
                                    <select name="day{{$today}}destination[]" id="destination" class="">
                                        @if(isset($body['destination']))
                                            <option value="{{ $body['destination'] }}" selected>{{ $body['destination'] }}</option>
                                        @endif
                                        <option value=""></option>
                                        <option value="徒歩">徒歩</option>
                                        <option value="車">車</option>
                                        <option value="バス">バス</option>
                                        <option value="電車">電車</option>
                                        <option value="新幹線">新幹線</option>
                                        <option value="飛行機">飛行機</option>
                                    </select>
                                </div>
                                <div class="body-right">
                                    <div class="body-top ">
                                        <input type="time" name="day{{$today}}time[]" class="body-time guide-form" value="{{ $body['time'] }}">
                                        <input type="text" name="day{{$today}}bodyTitle[]" class="body-title guide-form" placeholder="タイトル(例 出発)" value="{{ $body['bodyTitle'] }}">
                                    </div>
                                    <div class="body-bottom">
                                        <textarea class="w-100" name="day{{$today}}bodyDetail[]" rows="" placeholder="詳細">{{ $body['bodyDetail'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <span id="body-add{{$today}}" class="addBtn"></span>
                </div>
                @php $today++ @endphp
            @endforeach
            <div id="addDateBefore" class="my-4">
                <p id="addDate" class="btn d-block border bg-secondary text-white shadow">日付を追加する</p>
            </div>
            <input type="hidden" id="maxDay" name="maxDay" value="{{$maxDay}}">
            <input type="submit" value="完了" class="w-100 shadow-sm mt-5">
        </form>
    </div>
</div>
@endsection
