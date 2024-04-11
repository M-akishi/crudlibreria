<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Ciudad') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.ciudad.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Ciudad')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- Des_ciudad Input -->
            <div class='form-group'>
                <label for='input-des_ciudad' class='col-sm-2 control-label '> {{ __('Des_ciudad') }}</label>
                <input type='text' id='input-des_ciudad' wire:model.lazy='des_ciudad' class="form-control  @error('des_ciudad') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('des_ciudad') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.ciudad.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
