<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Enciclopedia') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.enciclopedia.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Enciclopedia')) }}</a></li>
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
            <!-- Cantidad Input -->
            <div class='form-group'>
                <label for='input-cantidad' class='col-sm-2 control-label '> {{ __('Cantidad') }}</label>
                <input type='number' id='input-cantidad' wire:model.lazy='cantidad' class="form-control  @error('cantidad') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('cantidad') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Descripcion Input -->
            <div class='form-group'>
                <label for='input-descripcion' class='col-sm-2 control-label '> {{ __('Descripcion') }}</label>
                <input type='text' id='input-descripcion' wire:model.lazy='descripcion' class="form-control  @error('descripcion') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('descripcion') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.enciclopedia.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
