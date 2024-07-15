<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Libro_genero') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.genero libro.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Libro_genero')) }}</a></li>
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
                    @foreach(getCrudConfig('libro_genero')->inputs()['id_libro']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('id_libro') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Id_genero Input -->
            <div class='form-group'>
                <label for='input-id_genero' class='col-sm-2 control-label '> {{ __('Id_genero') }}</label>
                <select id='input-id_genero' wire:model.lazy='id_genero' class="form-control  @error('id_genero') is-invalid @enderror">
                    @foreach(getCrudConfig('libro_genero')->inputs()['id_genero']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('id_genero') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.genero libro.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
