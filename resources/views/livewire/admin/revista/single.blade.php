<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $revista->titulo }}</td>
    <td class="">{{ $revista->cantidad }}</td>
    <td class="">{{ $revista->descripcion }}</td>
    
    @if(getCrudConfig('Revista')->delete or getCrudConfig('Revista')->update)
        <td>

            @if(getCrudConfig('Revista')->update && hasPermission(getRouteName().'.revista.update', 1, 1, $revista))
                <a href="@route(getRouteName().'.revista.update', $revista->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Revista')->delete && hasPermission(getRouteName().'.revista.delete', 1, 1, $revista))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Revista') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Revista') ]) }}</p>
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
