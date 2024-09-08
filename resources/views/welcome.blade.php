<x-app-layout>
    <div class="max-w-6xl mx-auto relative">
        <!-- Carousel Wrapper -->
        <div id="luxury-carousel" class="relative h-64 sm:h-80 xl:h-96 2xl:h-[600px] overflow-hidden">
            <div class="carousel-inner flex transition-transform duration-700 ease-in-out">
                <!-- Carousel Items -->
                <div class="flex-shrink-0 w-full h-full duration-700 ease-in-out transition-opacity opacity-100" data-carousel-item>
                    <img src="https://www.buzzwebzine.fr/wp-content/uploads/2018/10/Pub-parfum-Givenchy-l-Interdit-Rooney-Maya.jpg" class="w-full h-full object-cover object-center transition-transform transform hover:scale-105" alt="Slide 1" onerror="this.src='https://via.placeholder.com/800x600?text=Image+Not+Available';">
                </div>
                <div class="flex-shrink-0 w-full h-full duration-700 ease-in-out transition-opacity opacity-0" data-carousel-item>
                    <img src="https://fastncurious.fr/wp-content/uploads/2020/11/CHANEL-2.png" class="w-full h-full object-cover object-center transition-transform transform hover:scale-105" alt="Slide 2" onerror="this.src='https://via.placeholder.com/800x600?text=Image+Not+Available';">
                </div>
                <!-- Add more items here -->
            </div>

            <!-- Slider Indicators -->
            <div class="flex absolute bottom-5 left-1/2 space-x-3 -translate-x-1/2 z-30">
                <button type="button" class="w-3 h-3 rounded-full bg-white/70 hover:bg-white" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full bg-white/70 hover:bg-white" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <!-- Add more indicators here -->
            </div>

            <!-- Slider Controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center px-4 h-full cursor-pointer group hover:bg-gray-800/50" data-carousel-prev>
                <span class="w-12 h-12 rounded-full bg-white/70 group-hover:bg-white/90 flex items-center justify-center shadow-lg transition-transform transform hover:scale-110">
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center px-4 h-full cursor-pointer group hover:bg-gray-800/50" data-carousel-next>
                <span class="w-12 h-12 rounded-full bg-white/70 group-hover:bg-white/90 flex items-center justify-center shadow-lg transition-transform transform hover:scale-110">
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        <!-- Offers Section -->
        <section class="bg-white dark:bg-gray-900 py-12">
            <div class="container mx-auto px-6 lg:px-8">
                <div class="text-3xl font-bold text-red-600 text-center mb-6">Explore Our Perfume Collections</div>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
                    <!-- Men's Perfumes -->
                    <div class="relative bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden dark:bg-gray-800 dark:border-gray-700 transition-transform transform hover:scale-105 hover:shadow-2xl">
                        <img 
                            src="https://s3-ap-southeast-1.amazonaws.com/kpc-prod-web-static/frontend/microsite/dior/images/310823Banner/collection-Sep-2023-Sauvage-phone.jpg" 
                            alt="Men's Perfume" 
                            class="w-full h-64 object-cover transition-transform transform hover:scale-110"
                            onerror="this.src='https://via.placeholder.com/800x600?text=Image+Not+Available';"
                        />
                        <div class="p-4">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center mb-2">
                                Men’s Collection
                            </h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 text-center">
                                Discover our exclusive range of men's perfumes, crafted to leave a lasting impression.
                            </p>
                            <a href="/productsM"> <button class="w-full bg-black text-white px-4 py-2 rounded-md font-medium transition-transform transform hover:scale-105 hover:bg-gray-800 shadow-md hover:shadow-lg">
                                Explore
                            </button></a>
                        </div>
                    </div>
                    <!-- Women's Perfumes -->
                    <div class="relative bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden dark:bg-gray-800 dark:border-gray-700 transition-transform transform hover:scale-105 hover:shadow-2xl">
                        <img 
                            src="https://cdn.shopify.com/s/files/1/0502/9393/2199/files/MD_Parfum_Instit_NP_E-merch_3700x3000_9917f2fd-24a6-4e3c-b4ec-e24c388b9ded.jpg?v=1716967520" 
                            alt="Women's Perfume" 
                            class="w-full h-64 object-cover transition-transform transform hover:scale-110"
                            onerror="this.src='https://via.placeholder.com/800x600?text=Image+Not+Available';"
                        />
                        <div class="p-4">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center mb-2">
                                Women’s Collection
                            </h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 text-center">
                                Explore our luxurious collection of women’s perfumes, perfect for any occasion.
                            </p>
                            <a href="/productsW">
                                <button class="w-full bg-black text-white px-4 py-2 rounded-md font-medium transition-transform transform hover:scale-105 hover:bg-gray-800 shadow-md hover:shadow-lg">
                                Discover
                            </button>
                        </a></a>
                        </div>
                    </div>
                    <!-- All Ages Perfumes -->
                    <div class="relative bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden dark:bg-gray-800 dark:border-gray-700 transition-transform transform hover:scale-105 hover:shadow-2xl">
                        <img 
                            src="https://static.ffx.io/images/$zoom_0.601%2C$multiply_0.7725%2C$ratio_1.5%2C$width_756%2C$x_0%2C$y_249/t_crop_custom/q_86%2Cf_auto/5d1394b324e72f26250ec5b09151a930fc3e227b" 
                            alt="All Ages Perfume" 
                            class="w-full h-64 object-cover transition-transform transform hover:scale-110"
                            onerror="this.src='https://via.placeholder.com/800x600?text=Image+Not+Available';"
                        />
                        <div class="p-4">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center mb-2">
                                All Ages Collection
                            </h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 text-center">
                                Find the perfect fragrance for any age, featuring a wide range of delightful scents.
                            </p>
                          <a href="/products">  <button class="w-full bg-black text-white px-4 py-2 rounded-md font-medium transition-transform transform hover:scale-105 hover:bg-gray-800 shadow-md hover:shadow-lg">
                                Explore
                            </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
 <!-- Popular Products Section -->
 <section class="bg-red-300 dark:bg-gray-900 py-12">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-3xl font-bold text-white text-center mb-6">LES PLUS AIMÉS</div>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
            @forEach($topProducts as $product)
            <div class="relative bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden dark:bg-gray-800 dark:border-gray-700 transition-transform transform hover:scale-105 hover:shadow-2xl">
                <img 
                    src="{{ $product->image }}" 
                    alt="Product Image" 
                    class="w-48 h-48 object-cover mx-auto mt-4 mb-2 transition-transform transform hover:scale-110"
                    onerror="this.src='https://via.placeholder.com/200x200?text=Image+Not+Available';"
                />
                <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded-full shadow-md">Top Pick</div>
                <div class="p-4">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 text-center mb-2">
{{$product->name}}                            </h4>
                    <div class="text-center mb-2">
                        <span class="text-xl font-bold text-red-600">{{$product->price/100}}€</span>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-400 mb-2 text-center">
                        {{$product->description}}
                    </p>
                    <button class="w-full bg-black text-white px-4 py-2 rounded-md font-medium transition-transform transform hover:scale-105 hover:bg-gray-800 shadow-md hover:shadow-lg">
                        DÉCOUVRIR
                    </button>
                </div>
            </div>
            @endForEach
        </div>
    </div>
</section>
        <!-- Customer Reviews Section -->
        <section class="bg-white dark:bg-gray-900 py-12">
            <div class="container mx-auto px-6 lg:px-8">
                <div class="text-3xl font-bold text-red-600 text-center mb-6">Customer Reviews</div>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2">
                    <!-- Review 1 -->
                    <div class="relative bg-gray-100 border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 p-6">
                        <div class="flex items-center mb-4">
                            <img src="https://i.pinimg.com/236x/7c/ec/88/7cec88b1abd4c0eb331ddaa5b7da7ed7.jpg" alt="Customer 1" class="w-12 h-12 rounded-full object-cover mr-4" onerror="this.src='https://via.placeholder.com/60?text=No+Image';">
                            <div>
                                <h5 class="text-lg font-semibold text-gray-800 dark:text-gray-200">John Doe</h5>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Verified Buyer</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            "Absolutely stunning fragrances! The selection is top-notch, and the customer service was exceptional. Will definitely be returning."
                        </p>
                    </div>
                    <!-- Review 2 -->
                    <div class="relative bg-gray-100 border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 p-6">
                        <div class="flex items-center mb-4">
                            <img src="https://i.pinimg.com/236x/ba/73/f2/ba73f24d48ce854cf6b065187cedf26a.jpg" alt="Customer 2" class="w-12 h-12 rounded-full object-cover mr-4" onerror="this.src='https://via.placeholder.com/60?text=No+Image';">
                            <div>
                                <h5 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Jane Smith</h5>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Verified Buyer</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            "I’m in love with my new perfume. It’s exactly what I was looking for, and the quality is outstanding. Highly recommend!"
                        </p>
                    </div>
                    <!-- Review 3 -->
                    <div class="relative bg-gray-100 border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 p-6">
                        <div class="flex items-center mb-4">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRw0uZWcbBYrXZABKN4VSDrCJjJ4N3cu5Zitw&s" alt="Customer 3" class="w-12 h-12 rounded-full object-cover mr-4" onerror="this.src='https://via.placeholder.com/60?text=No+Image';">
                            <div>
                                <h5 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Alexa Johnson</h5>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Verified Buyer</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            "The best perfume shop I’ve ever experienced. The fragrances are exquisite and the service is impeccable."
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gray-100 dark:bg-gray-900 py-12">
            <div class="container mx-auto px-6 lg:px-8">
                <div class="text-3xl font-bold text-gray-800 dark:text-gray-200 text-center mb-6">
                    How It Works
                </div>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 p-6 transition-transform transform hover:scale-105">
                        <svg class="w-12 h-12 text-red-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Browse</h4>
                        <p class="text-center text-gray-600 dark:text-gray-400">
                            Explore our wide range of luxurious fragrances, each curated to meet your unique preferences.
                        </p>
                    </div>
                    <!-- Step 2 -->
                    <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 p-6 transition-transform transform hover:scale-105">
                        <svg class="w-12 h-12 text-red-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4 4m0 0l-4 4m4-4H3m0 0l4-4m-4 4l4 4"></path>
                        </svg>
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Order</h4>
                        <p class="text-center text-gray-600 dark:text-gray-400">
                            Once you've selected your favorite fragrance, proceed to our secure checkout to place your order.
                        </p>
                    </div>
                    <!-- Step 3 -->
                    <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 p-6 transition-transform transform hover:scale-105">
                        <svg class="w-12 h-12 text-red-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7"></path>
                        </svg>
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Enjoy</h4>
                        <p class="text-center text-gray-600 dark:text-gray-400">
                            Receive your fragrance and enjoy the luxury and elegance that each scent brings.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Promise Section -->
        <section class="bg-white dark:bg-gray-900 py-12">
            <div class="container mx-auto px-6 lg:px-8">
                <div class="text-3xl font-bold text-red-600 text-center mb-6">Our Promise</div>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4">
                    <!-- Promise 1 -->
                    <div class="flex flex-col items-center bg-gray-100 border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 p-6 transition-transform transform hover:scale-105">
                        <svg class="w-12 h-12 text-red-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Quality</h4>
                        <p class="text-center text-gray-600 dark:text-gray-400">
                            We ensure that all our fragrances are of the highest quality, crafted with care and precision.
                        </p>
                    </div>
                    <!-- Promise 2 -->
                    <div class="flex flex-col items-center bg-gray-100 border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 p-6 transition-transform transform hover:scale-105">
                        <svg class="w-12 h-12 text-red-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m4-4H8"></path>
                        </svg>
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Customer Service</h4>
                        <p class="text-center text-gray-600 dark:text-gray-400">
                            Our customer service team is dedicated to providing you with the best shopping experience.
                        </p>
                    </div>
                    <!-- Promise 3 -->
                    <div class="flex flex-col items-center bg-gray-100 border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 p-6 transition-transform transform hover:scale-105">
                        <svg class="w-12 h-12 text-red-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Satisfaction</h4>
                        <p class="text-center text-gray-600 dark:text-gray-400">
                            We strive to ensure every customer is completely satisfied with their purchase.
                        </p>
                    </div>
                    <!-- Promise 4 -->
                    <div class="flex flex-col items-center bg-gray-100 border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 p-6 transition-transform transform hover:scale-105">
                        <svg class="w-12 h-12 text-red-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Sustainability</h4>
                        <p class="text-center text-gray-600 dark:text-gray-400">
                            Our products are made with eco-friendly practices to ensure sustainability.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Brands Section -->
       @php
$brandLogos = [
    'https://api-fashion.dior.com/couture/var/dior/storage/images/horizon/logo-dior/25334685-1-fre-FR/logo-dior_mobile_share.jpg',
    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWYXZWDLYCXlIGD8swntMMDpt1II9MYlptpw&s',
    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaSRdQ_B2pA18eKUY3ZFRKjndnyw9_v2Jztw&s',
    'https://cdn.shopify.com/s/files/1/0558/6413/1764/files/Rewrite_Yves_Saint_Laurent_Logo_Design_History_Evolution_0_1024x1024.jpg?v=1695907301',
    'https://www.artandstick.be/getsupercustomizedimage.php5?objid=4782&colorid1=41&colorid2=4&colorid3=4&colorid4=4&colorid5=4&way=NORMAL&transparent=Y',
    'https://static.vecteezy.com/system/resources/previews/027/127/479/original/chanel-logo-chanel-icon-transparent-free-png.png',
];
@endphp
<!-- Brands Section -->
<section class="bg-gray-100 dark:bg-gray-900 py-12">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-3xl font-bold text-gray-800 dark:text-gray-200 text-center mb-6">
            All Our Brands
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @foreach ($brandLogos as $logo)
            <div class="flex items-center justify-center bg-white p-4 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 transition-transform transform hover:scale-105">
                <img 
                    src="{{ $logo }}" 
                    alt="Brand Logo" 
                    class="w-24 h-24 object-contain"
                    onerror="this.src='https://via.placeholder.com/150?text=Logo+Not+Available';"
                />
            </div>
            @endforeach
        </div>
    </div>
</section>

                
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const carousel = document.getElementById("luxury-carousel");
            const items = carousel.querySelectorAll("[data-carousel-item]");
            const indicators = carousel.querySelectorAll("[data-carousel-slide-to]");
            const totalItems = items.length;
            let currentIndex = 0;

            function showSlide(index) {
                items.forEach((item, i) => {
                    item.classList.toggle("opacity-100", i === index);
                    item.classList.toggle("opacity-0", i !== index);
                });
                indicators.forEach((indicator, i) => {
                    indicator.classList.toggle("bg-red-600", i === index);
                    indicator.classList.toggle("bg-white/70", i !== index);
                });
            }

            function nextSlide() {
                const nextIndex = (currentIndex + 1) % totalItems;
                showSlide(nextIndex);
                currentIndex = nextIndex;
            }

            function prevSlide() {
                const prevIndex = (currentIndex - 1 + totalItems) % totalItems;
                showSlide(prevIndex);
                currentIndex = prevIndex;
            }

            carousel.querySelector("[data-carousel-prev]").addEventListener("click", prevSlide);
            carousel.querySelector("[data-carousel-next]").addEventListener("click", nextSlide);
            indicators.forEach((indicator, i) => {
                indicator.addEventListener("click", () => {
                    showSlide(i);
                    currentIndex = i;
                });
            });

            // Automatically advance to the next slide every 5 seconds
            setInterval(nextSlide, 5000);
        });
    </script>
</x-app-layout>
