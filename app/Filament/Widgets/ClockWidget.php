<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\Widget;

class ClockWidget extends Widget
{
    protected static string $view = 'filament.widgets.clock-widget';

    protected int | string | array $columnSpan = [
        'xl' => 9,
        'md' => 6,
        'sm' => 3,
        'xs' => 3
    ];

    protected static ?int $sort = 1;
    
    public function getCurrentDateTime()
    {
        Carbon::setLocale('es');
        $timeString = Carbon::now()->translatedFormat('l  j F  Y H:i:s');
        return $timeString;
    }
}
