<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $movimientoprod->num_mov }}</td>
    <td class="">{{ $movimientoprod->bod_origen }}</td>
    <td class="">{{ $movimientoprod->bod_destino }}</td>
    <td class="">{{ $movimientoprod->cod_libro }}</td>
    <td class="">{{ $movimientoprod->cantidad }}</td>
    
    @if(getCrudConfig('Movimientoprod')->delete or getCrudConfig('Movimientoprod')->update)
        <td>

            @if(getCrudConfig('Movimientoprod')->update && hasPermission(getRouteName().'.movimientoproductos.update', 1, 0, $movimientoprod))
                <a href="@route(getRouteName().'.movimientoproductos.update', $movimientoprod->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Movimientoprod')->delete && hasPermission(getRouteName().'.movimientoproductos.delete', 1, 0, $movimientoprod))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Movimientoprod') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Movimientoprod') ]) }}</p>
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
