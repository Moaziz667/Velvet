<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @php
        $orders = auth()->user()->orders;
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-red-200 border-b border-gray-200">
                    @foreach ($orders as $order)
                    <table class="table-auto w-full">
                        <thead class="border-b">
                            <h2 class="font-bold bg-white p-2">Commande n° {{ $order->id }} passée le {{ $order->created_at->format('d M Y') }}</h2>
                        </thead>
                        <tbody>
                           <tr class="border-b hover:bg-gray-50">
                              <td class="p-4">
                                Nom
                              </td>
                              <td class="p-4">
                                 Prix
                              </td>
                              <td class="p-4">
                                 Quantité
                              </td>
                           </tr>
                           @foreach($order->products as $product)
                           <tr class="border-b hover:bg-gray-50">
                              <td class="p-4">
                                {{ $product->name }}
                              </td>
                              <td class="p-4">
                                {{ str_replace('.', ',', $product->pivot->total_price / 100) . ' €' }} 
                              </td>
                              <td class="p-4">
                                {{ $product->pivot->total_quantity }}
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>