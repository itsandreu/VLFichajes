<?php

namespace App\Jobs;

use App\Models\Fichaje;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SalidaJob implements ShouldQueue
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
        date_default_timezone_set('Europe/Madrid');
        $user = $this->userObject;
        $fechaHoy = Carbon::today();
        $id = $user->id;
        $fichajeHoy = Fichaje::where('user_id', $id)->whereDate('hora_entrada_mañana', $fechaHoy)->first();
        if ($fichajeHoy->hora_salida_mañana == null) {
            $fichajeHoy->update(['hora_salida_mañana' => Carbon::now()]);
        }else {
            $fichajeHoy->update(['hora_salida_tarde' => Carbon::now()]);
        }
        // Fichaje::where('user_id', $id)->whereDate('hora_entrada_mañana', $fechaHoy)->update(['hora_salida_mañana' => Carbon::now()]);
    }
}
