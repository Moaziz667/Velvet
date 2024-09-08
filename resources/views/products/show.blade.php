
<x-app-layout>
    

    <x-slot name="header">
        {{-- <button class="border rounded-lg border-black text-xl text-black p-2 transition duration-400 hover:bg-black hover:text-white">
             Back
        </button> --}}
        <a href="/products" class="inline-flex items-center px-3 py-1.5 text-white bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-md shadow-sm hover:from-yellow-300 hover:to-yellow-500 transition-all duration-300 text-sm font-medium">
            <i class="fas fa-arrow-left mr-1"></i> Back to Shopping
        </a>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg border border-gray-200">
                <div class="flex flex-col lg:flex-row">
                    <!-- Product Image -->
                    <div class="lg:w-1/2 w-full relative">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-t lg:rounded-l lg:rounded-tr-none border-b lg:border-r lg:border-b-0 border-gray-200 cursor-pointer transition-transform transform group-hover:scale-105 duration-300">
                    </div>

                    <!-- Product Details -->
                    <div class="lg:w-1/2 w-full p-6">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest mb-1">BRAND NAME</h2>
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">{{ $product->name }}</h1>

                        <div class="flex mb-4">
                            <span class="flex items-center">
                                <!-- Star Ratings -->
                                <rate :product_id = "{{$product->id}}"/>
                            </span>
                            <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
                                <a class="text-gray-500">
                                    <!-- Facebook Icon -->
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                    </svg>
                                </a>
                                <a class="ml-2 text-gray-500">
                                    <!-- Twitter Icon -->
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                                    </svg>
                                </a>
                                <a class="ml-2 text-gray-500">
                                    <!-- Instagram Icon -->
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                                    </svg>
                                </a>
                            </span>
                        </div>

                        <p class="leading-relaxed mb-6">{{ $product->description }}</p>

                        <div class="flex items-center">
                            <span class="title-font font-medium text-2xl text-gray-900 p-4">${{ $product->price /100 }}</span>
                            <add-to-cart class="" :product-id="{{$product->id}}"/>
                            <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
