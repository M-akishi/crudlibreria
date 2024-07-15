<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioB extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_bodega','id_libro','cantidad'];

    public function bodega()
    {
        return $this->belongsTo(Bodega::class, 'id_bodega');
    }

    public function libro()
    {
        return $this->belongsTo(Libros::class,'id_libro');
    }
}
