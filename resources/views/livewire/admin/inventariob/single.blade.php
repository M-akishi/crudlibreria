<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $inventariob->id_bodega }}</td>
    <td class="">{{ $inventariob->id_libro }}</td>
    <td class="">{{ $inventariob->cantidad }}</td>
    
    @if(getCrudConfig('InventarioB')->delete or getCrudConfig('InventarioB')->update)
        <td>

            @if(getCrudConfig('InventarioB')->update && hasPermission(getRouteName().'.inventariobodega.update', 1, 0, $inventariob))
                <a href="@route(getRouteName().'.inventariobodega.update', $inventariob->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('InventarioB')->delete && hasPermission(getRouteName().'.inventariobodega.delete', 1, 0, $inventariob))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('InventarioB') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('InventarioB') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
