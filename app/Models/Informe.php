<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;
    protected $fillable = ['titulo','created_at'];

    public function tipoLibro()
    {
        return $this->belongsTo(TipoLibro::class, 'tipolibros_id');
    }

    public function bodega()
    {
        return $this->belongsTo(Bodega::class, 'bodegas _id');
    }

    public function editorial()
    {
        return $this->belongsTo(Editorial::class, 'editorials_id');
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libros_id');
    }

    public function revista()
    {
        return $this->belongsTo(Revista::class, 'revistas_id');
    }

    public function enciclopedia()
    {
        return $this->belongsTo(Enciclopedia::class, 'enciclopedias_id');
    }
    

}
