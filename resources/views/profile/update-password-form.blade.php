<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('') }}
    </x-slot>

    <x-slot name="description">
        {{ __('') }}
    </x-slot>

    <x-slot name="form">
        <div class="mb-3">
            <x-jet-label class="d-block" for="current_password" value="{{ __('現在のパスワード') }}" />
            <x-jet-input id="current_password" type="password" class="w-100" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="" />
        </div>

        <div class="mb-3">
            <x-jet-label class="d-block" for="password" value="{{ __('新しいパスワード') }}" />
            <x-jet-input id="password" type="password" class="w-100" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="" />
        </div>

        <div class="mb-5">
            <x-jet-label class="d-block" for="password_confirmation" value="{{ __('新しいパスワード(確認)') }}" />
            <x-jet-input id="password_confirmation" type="password" class="w-100" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <input type="submit" class="w-100" value="変更する">
    </x-slot>
</x-jet-form-section>
