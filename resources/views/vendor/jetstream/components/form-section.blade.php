@props(['submit'])

<div class="container">
    <h1 class="text-center h3 mb-5">パスワードを変更する</h1>

    <div class="border w-50 mx-auto shadow-sm">
        <div class="w-75 mx-auto py-4">
            <form wire:submit.prevent="{{ $submit }}">
                <div class="">
                    <div class="">
                        {{ $form }}
                    </div>
                </div>
                @if (isset($actions))
                    <div class="">
                        {{ $actions }}
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
