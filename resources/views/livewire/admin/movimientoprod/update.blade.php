<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Movimientoprod') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.movimientoproductos.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Movimientoprod')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- Num_mov Input -->
            <div class='form-group'>
                <label for='input-num_mov' class='col-sm-2 control-label '> {{ __('Num_mov') }}</label>
                <input type='number' id='input-num_mov' wire:model.lazy='num_mov' class="form-control  @error('num_mov') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('num_mov') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Bod_origen Input -->
            <div class='form-group'>
                <label for='input-bod_origen' class='col-sm-2 control-label '> {{ __('Bod_origen') }}</label>
                <select id='input-bod_origen' wire:model.lazy='bod_origen' class="form-control  @error('bod_origen') is-invalid @enderror">
                    @foreach(getCrudConfig('movimientoprod')->inputs()['bod_origen']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('bod_origen') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Bod_destino Input -->
            <div class='form-group'>
                <label for='input-bod_destino' class='col-sm-2 control-label '> {{ __('Bod_destino') }}</label>
                <select id='input-bod_destino' wire:model.lazy='bod_destino' class="form-control  @error('bod_destino') is-invalid @enderror">
                    @foreach(getCrudConfig('movimientoprod')->inputs()['bod_destino']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('bod_destino') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Cod_libro Input -->
            <div class='form-group'>
                <label for='input-cod_libro' class='col-sm-2 control-label '> {{ __('Cod_libro') }}</label>
                <select id='input-cod_libro' wire:model.lazy='cod_libro' class="form-control  @error('cod_libro') is-invalid @enderror">
                    @foreach(getCrudConfig('movimientoprod')->inputs()['cod_libro']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('cod_libro') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Cantidad Input -->
            <div class='form-group'>
                <label for='input-cantidad' class='col-sm-2 control-label '> {{ __('Cantidad') }}</label>
                <input type='number' id='input-cantidad' wire:model.lazy='cantidad' class="form-control  @error('cantidad') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('cantidad') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.movimientoproductos.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
