<x-filament-widgets::widget>
    <x-filament::section class="text-center">
        {{-- Widget content --}}
        <div class="card">
    <div wire:poll.1000ms class="card-body">
        <p class="card-text" style="font-size: 2em;">{{ $this->getCurrentDateTime() }}</p>
    </div>
</div>

    </x-filament::section>
</x-filament-widgets::widget>
