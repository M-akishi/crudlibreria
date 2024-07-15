<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Movimientoprod')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Movimientoprod')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('Movimientoprod')->create && hasPermission(getRouteName().'.movimientoproductos.create', 1, 0))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.movimientoproductos.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Movimientoprod') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('Movimientoprod')->searchable())
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" @if(config('easy_panel.lazy_mode')) wire:model.lazy="search" @else wire:model="search" @endif placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin" ></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col" style='cursor: pointer' wire:click="sort('num_mov')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'num_mov') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'num_mov') fa-sort-amount-up ml-2 @endif'></i> {{ __('Guia de despacho') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('bod_origen')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'bod_origen') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'bod_origen') fa-sort-amount-up ml-2 @endif'></i> {{ __('bodega origen') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('bod_destino')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'bod_destino') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'bod_destino') fa-sort-amount-up ml-2 @endif'></i> {{ __('bodega destino') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('cod_libro')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'cod_libro') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'cod_libro') fa-sort-amount-up ml-2 @endif'></i> {{ __('libro') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('cantidad')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'cantidad') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'cantidad') fa-sort-amount-up ml-2 @endif'></i> {{ __('cantidad') }} </th>
                            
                            @if(getCrudConfig('Movimientoprod')->delete or getCrudConfig('Movimientoprod')->update)
                                <th scope="col">{{ __('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($movimientoprods as $movimientoprod)
                            @livewire('admin.movimientoprod.single', [$movimientoprod], key($movimientoprod->id))
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $movimientoprods->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
