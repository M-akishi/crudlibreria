<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('InventarioB') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.inventariobodega.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('InventarioB')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Id_libro Input -->
            <div class='form-group'>
                <label for='input-id_libro' class='col-sm-2 control-label '> {{ __('Id_libro') }}</label>
                <select id='input-id_libro' wire:model.lazy='id_libro' class="form-control  @error('id_libro') is-invalid @enderror">
                    @foreach(getCrudConfig('InventarioB')->inputs()['id_libro']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('id_libro') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Id_bodega Input -->
            <div class='form-group'>
                <label for='input-id_bodega' class='col-sm-2 control-label '> {{ __('Id_bodega') }}</label>
                <select id='input-id_bodega' wire:model.lazy='id_bodega' class="form-control  @error('id_bodega') is-invalid @enderror">
                    @foreach(getCrudConfig('InventarioB')->inputs()['id_bodega']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('id_bodega') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Cantidad Input -->
            <div class='form-group'>
                <label for='input-cantidad' class='col-sm-2 control-label '> {{ __('Cantidad') }}</label>
                <input type='number' id='input-cantidad' wire:model.lazy='cantidad' class="form-control  @error('cantidad') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('cantidad') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.inventariobodega.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
