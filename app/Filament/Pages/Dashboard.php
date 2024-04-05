<?php

namespace App\Filament\Pages;

class Dashboard extends \Filament\Pages\Dashboard
{
//     public function getColumns(): int | string | array
// {
//     return 8;
// }
public function getColumns(): int | string | array
{
    return [
        'xl' => 9,
        'md' =>6, 
        'sm' => 3,
        'xs' => 3 // No funciona
    ];
}
}