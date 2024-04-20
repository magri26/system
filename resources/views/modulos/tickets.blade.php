<x-nav :menu="$menu">
    
<div class="container mx-auto px-4">
    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Usuario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        vehiculo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ticket as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->user_id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->veh_id}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->descripcion}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</x-nav>