<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $ciudad->des_ciudad }}</td>
    
    @if(getCrudConfig('Ciudad')->delete or getCrudConfig('Ciudad')->update)
        <td>

            @if(getCrudConfig('Ciudad')->update && hasPermission(getRouteName().'.ciudad.update', 1, 0, $ciudad))
                <a href="@route(getRouteName().'.ciudad.update', $ciudad->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Ciudad')->delete && hasPermission(getRouteName().'.ciudad.delete', 1, 0, $ciudad))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Ciudad') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Ciudad') ]) }}</p>
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
