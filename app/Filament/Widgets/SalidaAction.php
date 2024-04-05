<?php

namespace App\Filament\Widgets;

use App\Jobs\EntradaJob;
use App\Jobs\SalidaJob;
use App\Models\Fichaje;
use Carbon\Carbon;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Actions\Contracts\HasActions;
use Filament\Widgets\Widget;
use Filament\Actions\Action;
use Filament\Support\Enums\ActionSize;

class SalidaAction extends Widget implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    protected static string $view = 'filament.widgets.salida-action';

    protected int | string | array $columnSpan = [
        'xl' => 3,
        'md' => 2,
        'sm' => 1,
        'xs' => 1
    ];

    protected static ?int $sort = 3;

    protected function salidaAction(): Action
    {
        return Action::make('salidaAction')->label('Salida')->color('danger')
        ->requiresConfirmation()
        ->modalHeading("¿Acabas de salir en tu puesto de trabajo?")
        ->modalDescription("")
        ->size(ActionSize::ExtraLarge)
        ->action(function(){
            $userObject = auth()->user();
            SalidaJob::dispatch($userObject);
        })->disabled(function (){
            $user = auth()->user();
            $fechaHoy = Carbon::today();
            
            $fichaje = Fichaje::where('user_id', $user->id)->whereDate('hora_entrada_mañana', $fechaHoy)->first();

            if ($fichaje == null) {
                return true;
            }elseif (!empty($fichaje->hora_entrada_mañana) && empty($fichaje->hora_salida_mañana) && empty($fichaje->hora_entrada_tarde) && empty($fichaje->hora_salida_tarde)) {
                return false;
            }elseif (!empty($fichaje->hora_entrada_mañana) && !empty($fichaje->hora_salida_mañana) && empty($fichaje->hora_entrada_tarde) && empty($fichaje->hora_salida_tarde)) {
                return true;
            }elseif (!empty($fichaje->hora_entrada_mañana) && !empty($fichaje->hora_salida_mañana) && !empty($fichaje->hora_entrada_tarde) && empty($fichaje->hora_salida_tarde)) {
                return false;
            }else {
                return true;
            }



            // if ($fichaje) {
            //     $fichajeSalidaExist = Fichaje::where('user_id', $user->id)->whereDate('hora_entrada_mañana', $fechaHoy)->first();
                
            //     if ($fichajeSalidaExist) {
            //         return true;
            //     }else{
            //         return false;
            //     }
            // }else{
            //     return true;
            // }
        });
    }
}
