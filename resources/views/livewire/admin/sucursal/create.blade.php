<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Sucursal') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.sucursal.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Sucursal')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Region_id Input -->
            <div class='form-group'>
                <label for='input-region_id' class='col-sm-2 control-label '> {{ __('Region_id') }}</label>
                <select id='input-region_id' wire:model.lazy='region_id' class="form-control  @error('region_id') is-invalid @enderror">
                    @foreach(getCrudConfig('Sucursal')->inputs()['region_id']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('region_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Ciudad_id Input -->
            <div class='form-group'>
                <label for='input-ciudad_id' class='col-sm-2 control-label '> {{ __('Ciudad_id') }}</label>
                <select id='input-ciudad_id' wire:model.lazy='ciudad_id' class="form-control  @error('ciudad_id') is-invalid @enderror">
                    @foreach(getCrudConfig('Sucursal')->inputs()['ciudad_id']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('ciudad_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Direccion Input -->
            <div class='form-group'>
                <label for='input-direccion' class='col-sm-2 control-label '> {{ __('Direccion') }}</label>
                <input type='text' id='input-direccion' wire:model.lazy='direccion' class="form-control  @error('direccion') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('direccion') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.sucursal.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
