<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Bodega;
use App\Models\Sucursal;

class BodegaComponent implements CRUDComponent
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
        return Bodega::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        
        return [
            'num_bodega' => Field::title('Numero de bodega'),
            'sucursal.ciudad.des_ciudad' => Field::title('Ciudad'),
            'sucursal.region.des_region' => Field::title('Region'),
            'sucursal.direccion' => Field::title('Direccion')
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['num_bodega'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        $sucursales = Sucursal::get()->map(function ($sucursal) {
            $direccionCompleta = $sucursal->direccion . ', ' . $sucursal->ciudad->des_ciudad . ', ' . $sucursal->region->des_region;
            return $direccionCompleta;
        });
    
        $sucursales->prepend('');
    
        return [
            'num_bodega' => 'text',
            'cod_sucursal' => ['select' => $sucursales->all()]
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'num_bodega' => 'required',
            'cod_sucursal' => 'required'
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
