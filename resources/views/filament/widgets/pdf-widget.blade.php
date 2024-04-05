<x-filament-widgets::widget>
    <x-filament::section class="text-center">
        {{-- Widget content --}}
        <div>
            {{ $this->pdfAction }}
            <x-filament-actions::modals />
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
