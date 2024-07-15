<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\movimientoprod;
use App\Models\Bodega;
use App\Models\Libros;


class movimientoprodComponent implements CRUDComponent
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
        return movimientoprod::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return [
            'num_mov' => Field::title('Guia de despacho'),
            'bod_origen' => Field::title('bodega origen'),
            'bod_destino' => Field::title('bodega destino'),
            'cod_libro' => Field::title('libro'),
            'cantidad' => Field::title('cantidad')
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['num_mov', 'bod_origen', 'bod_destino', 'cod_libro'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        $origen = Bodega::pluck('num_bodega','id');
        $destino = Bodega::pluck('num_bodega', 'id');
        $libros = Libros::pluck('titulo','id');

        $origen = ['' => ''] + $origen->toArray();
        $destino = ['' => ''] + $destino->toArray();
        $libros = ['' => ''] + $libros->toArray();

        return [
            'num_mov' => 'number',
            'bod_origen' => ['select' => $origen],
            'bod_destino' => ['select' => $destino],
            'cod_libro' => ['select' => $libros],
            'cantidad' => 'number'
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
