<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">Broadcast Email</x-slot>

        <div class="flex flex-col gap-4">
            <x-filament::input.wrapper>
                <x-filament::input.select wire:model="selectedMail">
                    <option value="">— Select a Mailable —</option>
                    @foreach($this->getAvailableMailables() as $class => $label)
                        <option value="{{ $class }}">{{ $label }}</option>
                    @endforeach
                </x-filament::input.select>
            </x-filament::input.wrapper>
            <br>
            <x-filament::button
                wire:click="dispatchMail"
                wire:loading.attr="disabled"
                color="danger"
            >
                <span wire:loading.remove wire:target="dispatchMail">Send to All Subscribers</span>
                <span wire:loading wire:target="dispatchMail">Dispatching...</span>
            </x-filament::button>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>