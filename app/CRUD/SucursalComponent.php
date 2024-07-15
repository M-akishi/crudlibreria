<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Sucursal;
use App\Models\Region;
use App\Models\Ciudad;

class SucursalComponent implements CRUDComponent
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
        return Sucursal::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return [
            'region.des_region' => Field::title('Región'),
            'ciudad.des_ciudad' => Field::title('Ciudad'),
            'direccion' => Field::title('Direccion'),
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['direccion'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        $regions = Region::pluck('des_region', 'id');
        $ciudad = Ciudad::pluck('des_ciudad', 'id');

        $regions = ['' => ''] + $regions->toArray();
        $ciudad = ['' => ''] + $ciudad->toArray();

        return [
            'region_id' => ['select' => $regions],
            'ciudad_id' => ['select' => $ciudad],
            'direccion' => 'text'
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'direccion' => 'required',
            'region_id' => 'required',
            'ciudad_id' => 'required'
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
