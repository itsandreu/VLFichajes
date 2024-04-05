<?php

namespace App\Filament\Widgets;

use App\Jobs\PdfGenerateJob;
use App\Models\Fichaje;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\ActionSize;
use Filament\Widgets\Widget;

class PdfWidget extends Widget implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    protected static string $view = 'filament.widgets.pdf-widget';

    protected int | string | array $columnSpan = [
        'xl' => 3,
        'md' => 2,
        'sm' => 1,
        'xs' => 1
    ];

    protected static ?int $sort = 4;

    protected function pdfAction(): Action
    {
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Obtener los meses en los cuales existen fichajes para el usuario
        $fichajes = Fichaje::where('user_id', $user->id)->get();

        // Generar las opciones para los meses con fichajes
        $months = [];
        foreach ($fichajes as $fichaje) {
            $monthName = Carbon::parse($fichaje->created_at)->format('F Y');
            $months[$fichaje->created_at->month . "-" . $fichaje->created_at->year] = $monthName;
        }

        return Action::make('pdfAction')->label('Generate PDF')->color('warning')
            ->requiresConfirmation()
            ->modalHeading("¿Desea generar un nuevo documento de tus fichajes?")
            ->modalDescription("")
            ->modalIcon('heroicon-o-document')
            ->size(ActionSize::ExtraLarge)
            ->form([
                Select::make('mes')
                    ->label('Selecciona el mes')
                    ->options($months)
                    ->required(),
            ])
            ->action(function (array $data): void {
                $userObject = auth()->user();
                PdfGenerateJob::dispatch($userObject,$data);
            });
    }
}
