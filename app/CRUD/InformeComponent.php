<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Informe;
use Inertia\Inertia;
use Symfony\Contracts\Service\Attribute\Required;

class InformeComponent implements CRUDComponent
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
        return Informe::class;
    }

    public function index()
    {
        $informes = Informe::with('tipolibros', 'editorials', 'bodega', 'libros', 'revistas', 'enciclopedias')->get();
        return $informes;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return [
            'id','created_at','tipolibros.des_tipo', 'editorials.des_editorial','bodegas.id','libro.titulo','libro.cantidad','revista.titulo','revista.cantidad','enciclopedia.titulo','enciclopedia.cantidad'
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['id','created_at','tipolibros.des_tipo', 'editorials.des_editorial'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return ['id', 'created_at','tipolibros.des_tipo', 'editorials.des_editorial'];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'titulo' => 'required|min:10|max:50',
            'created_at' => 'required|date',
            'tipolibros_des_tipo' =>  'required|min:1',
            'editorials_des_editorial' => 'required|min:1',
            'bodegas_id' => 'required|min:1',
            'libros_titulo' => 'required|min:1',
            'libros_cantidad' => 'required|min:1',
            'revistas_titulo' => 'required|min:1',
            'revistas_cantidad' => 'required|min:1',
            'enciclopedias_titulo' =>  'required|min:1',
            'enciclopedias_cantidad' => 'required|min:1'
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
