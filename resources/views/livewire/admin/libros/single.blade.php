<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $libros->id }}</td>
    <td class="">{{ $libros->titulo }}</td>
    <td class="">{{ $libros->tipo_libro->des_tipo }}</td>
    <td class="">{{ $libros->autor_code->des_autores }}</td>
    <td class="">{{ $libros->des_libro }}</td>
    <td class="">{{ $libros->genero_code->des_generos }}</td>
    <td class="">{{ $libros->editorial_code->des_editorial }}</td>
    
    @if(getCrudConfig('Libros')->delete or getCrudConfig('Libros')->update)
        <td>

            @if(getCrudConfig('Libros')->update && hasPermission(getRouteName().'.libros.update', 1, 0, $libros))
                <a href="@route(getRouteName().'.libros.update', $libros->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Libros')->delete && hasPermission(getRouteName().'.libros.delete', 1, 0, $libros))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Libros') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Libros') ]) }}</p>
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
