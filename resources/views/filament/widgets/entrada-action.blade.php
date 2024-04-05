<x-filament-widgets::widget>
    <x-filament::section class="text-center">
        {{-- Widget content --}}
        <di wire:poll.500ms>
            {{ $this->entradaAction }}
            <x-filament-actions::modals />
        </di>
        
    </x-filament::section>
</x-filament-widgets::widget>


