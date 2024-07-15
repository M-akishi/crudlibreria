<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $informe->des_tipo }}</td>
    <td class="">{{ $informe->editorial }}</td>
    
    @if(getCrudConfig('Informe')->delete or getCrudConfig('Informe')->update)
        <td>

            @if(getCrudConfig('Informe')->update && hasPermission(getRouteName().'.informe.update', 1, 1, $informe))
                <a href="@route(getRouteName().'.informe.update', $informe->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Informe')->delete && hasPermission(getRouteName().'.informe.delete', 1, 1, $informe))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Informe') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Informe') ]) }}</p>
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
