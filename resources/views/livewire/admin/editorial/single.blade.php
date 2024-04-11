<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $editorial->des_editorial }}</td>
    
    @if(getCrudConfig('Editorial')->delete or getCrudConfig('Editorial')->update)
        <td>

            @if(getCrudConfig('Editorial')->update && hasPermission(getRouteName().'.editorial.update', 1, 0, $editorial))
                <a href="@route(getRouteName().'.editorial.update', $editorial->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Editorial')->delete && hasPermission(getRouteName().'.editorial.delete', 1, 0, $editorial))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Editorial') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Editorial') ]) }}</p>
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
