<x-app-layout>
    <x-slot name="header">
        <!-- Scrolling Banner -->
        <div class="relative text-yellow-300 text-center py-2 overflow-hidden">
            <div class="ticker-container">
                <p class="ticker-text">
                    🎉 Enjoy Free Delivery on Your First Purchase! Shop Now and Save on All Men's Products! 🎉
                </p>
                <p class="ticker-text">
                    🎉 Enjoy Free Delivery on Your First Purchase! Shop Now and Save on All Men's Products! 🎉
                </p>
            </div>
        </div>
    </x-slot>
    
    <search-items :gender="'Men'"></search-items>
</x-app-layout>