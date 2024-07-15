<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Libros') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.libros.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Libros')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Titulo Input -->
            <div class='form-group'>
                <label for='input-titulo' class='col-sm-2 control-label '> {{ __('Titulo') }}</label>
                <input type='text' id='input-titulo' wire:model.lazy='titulo' class="form-control  @error('titulo') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('titulo') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Tipo_libro Input -->
            <div class='form-group'>
                <label for='input-tipo_libro' class='col-sm-2 control-label '> {{ __('Tipo_libro') }}</label>
                <select id='input-tipo_libro' wire:model.lazy='tipo_libro' class="form-control  @error('tipo_libro') is-invalid @enderror">
                    @foreach(getCrudConfig('Libros')->inputs()['tipo_libro']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('tipo_libro') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Autor_code Input -->
            <div class='form-group'>
                <label for='input-autor_code' class='col-sm-2 control-label '> {{ __('Autor_code') }}</label>
                <select id='input-autor_code' wire:model.lazy='autor_code' class="form-control  @error('autor_code') is-invalid @enderror">
                    @foreach(getCrudConfig('Libros')->inputs()['autor_code']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('autor_code') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Des_libro Input -->
            <div class='form-group'>
                <label for='input-des_libro' class='col-sm-2 control-label '> {{ __('Des_libro') }}</label>
                <input type='text' id='input-des_libro' wire:model.lazy='des_libro' class="form-control  @error('des_libro') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('des_libro') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Genero_code Input -->
            <div class='form-group'>
                <label for='input-genero_code' class='col-sm-2 control-label '> {{ __('Genero_code') }}</label>
                <select id='input-genero_code' wire:model.lazy='genero_code' class="form-control  @error('genero_code') is-invalid @enderror">
                    @foreach(getCrudConfig('Libros')->inputs()['genero_code']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('genero_code') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Editorial_code Input -->
            <div class='form-group'>
                <label for='input-editorial_code' class='col-sm-2 control-label '> {{ __('Editorial_code') }}</label>
                <select id='input-editorial_code' wire:model.lazy='editorial_code' class="form-control  @error('editorial_code') is-invalid @enderror">
                    @foreach(getCrudConfig('Libros')->inputs()['editorial_code']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('editorial_code') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.libros.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
