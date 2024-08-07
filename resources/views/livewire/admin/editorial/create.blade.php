<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Editorial') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.editorial.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Editorial')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Des_editorial Input -->
            <div class='form-group'>
                <label for='input-des_editorial' class='col-sm-2 control-label '> {{ __('Des_editorial') }}</label>
                <input type='text' id='input-des_editorial' wire:model.lazy='des_editorial' class="form-control  @error('des_editorial') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('des_editorial') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.editorial.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
