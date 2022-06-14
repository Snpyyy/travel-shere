@if ($errors->any())
    <div {{ $attributes }}>
        <div class="text-center mb-3 h5">{{ __('エラーが発生しました') }}</div>

        <ul class="">
            @foreach ($errors->all() as $error)
                <li class="text-center mb-3 text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
