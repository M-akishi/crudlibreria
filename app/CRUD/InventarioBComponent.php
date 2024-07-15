<?php

namespace App\CRUD;

use App\Models\Libros;
use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\InventarioB;
use App\Models\Bodega;

class InventarioBComponent implements CRUDComponent
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
        return InventarioB::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return [
            'id_bodega' => Field::title('Numero de bodega'),
            'id_libro' => Field::title('ISBN Del Libro'),
            'cantidad' => Field::title('cantidad')
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['id_libro', 'id_bodega'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        $libros = Libros::pluck('titulo','id');
        $bodegas = Bodega::pluck('num_bodega','id');

        $libros = ['' => ''] + $libros->toArray();
        $bodegas = ['' => ''] + $bodegas->toArray();

        return [
            'id_libro' => ['select' => $libros],
            'id_bodega' => ['select' => $bodegas],
            'cantidad' => 'number'
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'id_libro' => 'required',
            'id_bodega' => 'required',
            'cantidad' => 'required'
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
