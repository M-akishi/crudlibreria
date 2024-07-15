<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    use HasFactory;

    protected $fillable = ['id','titulo','tipo_libro','autor_code','des_libro','genero_code','editorial_code'];

    public function tipo_libro()
    {
        return $this->belongsTo(Tipolibro::class, 'tipo_libro');
    }

    public function autor_code()
    {
        return $this->belongsTo(Autor::class, 'autor_code');
    }

    public function editorial_code()
    {
        return $this->belongsTo(Editorial::class, 'editorial_code');
    }

    public function genero_code()
    {
        return $this->belongsTo(Genero::class, 'genero_code');
    }


}
