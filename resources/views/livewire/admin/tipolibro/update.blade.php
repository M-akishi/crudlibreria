<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Tipolibro') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.tipolibro.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Tipolibro')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- Des_tipo Input -->
            <div class='form-group'>
                <label for='input-des_tipo' class='col-sm-2 control-label '> {{ __('Des_tipo') }}</label>
                <input type='text' id='input-des_tipo' wire:model.lazy='des_tipo' class="form-control  @error('des_tipo') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('des_tipo') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.tipolibro.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
