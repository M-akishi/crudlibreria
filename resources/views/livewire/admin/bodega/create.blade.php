<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Bodega') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.bodega.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Bodega')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Num_bodega Input -->
            <div class='form-group'>
                <label for='input-num_bodega' class='col-sm-2 control-label '> {{ __('Num_bodega') }}</label>
                <input type='text' id='input-num_bodega' wire:model.lazy='num_bodega' class="form-control  @error('num_bodega') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('num_bodega') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Cod_sucursal Input -->
            <div class='form-group'>
                <label for='input-cod_sucursal' class='col-sm-2 control-label '> {{ __('Cod_sucursal') }}</label>
                <select id='input-cod_sucursal' wire:model.lazy='cod_sucursal' class="form-control  @error('cod_sucursal') is-invalid @enderror">
                    @foreach(getCrudConfig('Bodega')->inputs()['cod_sucursal']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('cod_sucursal') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.bodega.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
