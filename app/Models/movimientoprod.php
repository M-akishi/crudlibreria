<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movimientoprod extends Model
{
    use HasFactory;
    protected $fillable = ['num_mov','bod_origen','bod_destino','cantidad','cod_libro'];

    public function bodorigen()
    {
        return $this->belongsTo(Bodega::class, 'bod_origen');
    }

    public function boddestino()
    {
        return $this->belongsTo(Bodega::class, 'bod_destino');
    }

    public function libro()
    {
        return $this->belongsTo(Libros::class, 'cod_libro');
    }
}
