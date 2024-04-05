<?php

namespace App\Jobs;

use App\Models\Fichaje;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class EntradaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userObject;
    /**
     * Create a new job instance.
     */
    public function __construct($userObject)
    {
        $this->userObject = $userObject;
    }
    /**
     * Execute the job.
     */
    public function handle()
    {
        $user = $this->userObject;
        $id = $user->id;
        date_default_timezone_set('Europe/Madrid');
        $fechaHoy = Carbon::today();

        $fichajeHoy = Fichaje::where('user_id', $id)
        ->whereDate('hora_entrada_mañana', '=', $fechaHoy->toDateString())
        ->first();

        if ($fichajeHoy) {
            // Si ya existe un fichaje para hoy, actualiza el registro
            $fichajeHoy->update([
                'hora_entrada_tarde' => Carbon::now(),
            ]);
        } else {
            // Si no existe un fichaje para hoy, crea uno nuevo
            Fichaje::create([
                'user_id' => $id,
                'hora_entrada_mañana' => Carbon::now()
            ]);
        }
        return redirect()->route('filament.admin.pages.dashboard');
    }
}
