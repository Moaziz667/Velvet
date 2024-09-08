<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products Women') }}
        </h2>
    </x-slot>
    
    <search-items :gender="'Women'"></search-items>
</x-app-layout>
