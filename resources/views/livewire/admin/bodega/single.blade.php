<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $bodega->num_bodega }}</td>
    <td class="">{{ $bodega->sucursal->ciudad->des_ciudad }}</td>
    <td class="">{{ $bodega->sucursal->region->des_region }}</td>
    <td class="">{{ $bodega->sucursal->direccion }}</td>
    
    @if(getCrudConfig('Bodega')->delete or getCrudConfig('Bodega')->update)
        <td>

            @if(getCrudConfig('Bodega')->update && hasPermission(getRouteName().'.bodega.update', 1, 0, $bodega))
                <a href="@route(getRouteName().'.bodega.update', $bodega->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Bodega')->delete && hasPermission(getRouteName().'.bodega.delete', 1, 0, $bodega))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Bodega') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Bodega') ]) }}</p>
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
