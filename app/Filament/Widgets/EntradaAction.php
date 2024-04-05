<?php

namespace App\Filament\Widgets;

use App\Jobs\EntradaJob;
use App\Models\Fichaje;
use Carbon\Carbon;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\Widget;
use Filament\Actions\Action;
use Filament\Support\Enums\ActionSize;
use Livewire\Component;

class EntradaAction extends Widget implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    protected static string $view = 'filament.widgets.entrada-action';

    protected int | string | array $columnSpan = [
        'xl' => 3,
        'md' => 2,
        'sm' => 1,
        'xs' => 1 // no funciona
    ];


    protected static ?int $sort = 2;

    protected function entradaAction(): Action
    {
        return Action::make('entradaAction')->label('Entrada')->color('success')
        ->requiresConfirmation()
        ->modalHeading("¿Acabas de entrar en tu puesto de trabajo?")
        ->modalDescription("")
        ->size(ActionSize::ExtraLarge)
        ->action(function(){
            $userObject = auth()->user();
            EntradaJob::dispatch($userObject);
        })->disabled(function (){
            $user = auth()->user();
            
            // Obtener la fecha de hoy
            $fechaHoy = Carbon::today();
            
            // Consultar si existe un registro en la tabla fichajes para el usuario actual con fecha de hoy
            $fichajeHoy = Fichaje::where('user_id', $user->id)
                ->whereDate('hora_entrada_mañana', $fechaHoy)
                ->first();
                // dd($fichajeHoy->hora_entrada_mañana,$fichajeHoy->hora_salida_mañana);
                if ($fichajeHoy == null) {
                    return false;
                }elseif (!empty($fichajeHoy->hora_entrada_mañana) && empty($fichajeHoy->hora_salida_mañana) && empty($fichajeHoy->hora_entrada_tarde) && empty($fichajeHoy->hora_salida_tarde)) {
                    return true;
                }elseif (!empty($fichajeHoy->hora_entrada_mañana) && !empty($fichajeHoy->hora_salida_mañana) && empty($fichajeHoy->hora_entrada_tarde) && empty($fichajeHoy->hora_salida_tarde)) {
                    return false;
                }elseif (!empty($fichajeHoy->hora_entrada_mañana) && !empty($fichajeHoy->hora_salida_mañana) && !empty($fichajeHoy->hora_entrada_tarde) && empty($fichajeHoy->hora_salida_tarde)) {
                    return true;
                }else {
                    return true;
                }
        });
    }
}
