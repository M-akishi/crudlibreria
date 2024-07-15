<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Libros;
use App\Models\Tipolibro;
use App\Models\Autor;
use App\Models\Editorial;
use App\Models\Genero;

class LibrosComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    public function getModel()
    {
        return Libros::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return [
            'id' => Field::title('ISBN'),
            'titulo' => Field::title('Titulo'),
            'tipo_libro.des_tipo' => Field::title('Tipo de documento'),
            'autor_code.des_autores' => Field::title('Autor'),
            'des_libro' => Field::title('Descripcion'),
            'genero_code.des_generos' => Field::title('Genero'),
            'editorial_code.des_editorial' => Field::title('Editorial')            
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['id', 'titulo', 'tipo_libro', 'autor_code', 'des_libro', 'genero', 'editorial_code'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        $tipos = Tipolibro::pluck('des_tipo','id');
        $autor = Autor::pluck('des_autores','id');
        $genero = Genero::pluck('des_generos','id');
        $editorial = Editorial::pluck('des_editorial','id');

        $tipos = ['' => ''] + $tipos->toArray();
        $autor = ['' => ''] + $autor->toArray();
        $genero = ['' => ''] + $genero->toArray();
        $editorial = ['' => ''] + $editorial->toArray();

        return [
            'titulo' => 'text',
            'tipo_libro' => ['select' => $tipos],
            'autor_code' => ['select' => $autor],
            'des_libro' => 'text',
            'genero_code' => ['select' => $genero],
            'editorial_code' => ['select' => $editorial]
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'titulo' => 'required',
            'tipo_libro' => 'required',
            'autor_code' => 'required',
            'des_libro' => 'required',
            'genero_code' => 'required',
            'editorial_code' => 'required'
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
