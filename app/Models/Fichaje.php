<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichaje extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','hora_entrada_mañana', 'hora_salida_mañana','hora_entrada_tarde', 'hora_salida_tarde'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getMesyanoAttribute()
    {
        setlocale(LC_ALL, 'es_ES'); 
        $date = $this->created_at;
        $fecha_formateada = strftime('%B-%Y', strtotime($date));
        return $fecha_formateada;
    }

    public function getDayAttribute()
    {
        setlocale(LC_TIME, 'es_ES.UTF-8');
        $date = $this->created_at;
        $fecha_formateada = strftime('%e de %B de %Y', strtotime($date));
        return $fecha_formateada;
    }
}
