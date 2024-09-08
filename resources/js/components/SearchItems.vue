<template>
    <section class="bg-white dark:bg-gray-900 py-12">
        <div class="container mx-auto px-6 lg:px-8">
            <p class="text-3xl font-bold mb-2">
                <i class="fa-sharp fa-solid fa-person px-1"></i>
                {{ gender }} Parfums
            </p>

            <div class="lg:flex lg:-mx-2">
                <!-- Sidebar for filters -->
                <div class="space-y-4 lg:w-1/5 lg:px-2 lg:space-y-6">
                    <input
                        type="text"
                        class="p-2 w-full rounded-lg border"
                        style="border-color: #eae3d2"
                        v-model="searchQuery"
                        @input="resetPageAndFetch"
                        placeholder="Search Parfums"
                    />

                    <!-- Filter by Price -->
                    <div class="space-y-2">
                        <h3
                            class="text-lg font-semibold text-gray-800 dark:text-gray-200"
                        >
                            Price Range
                        </h3>
                        <div class="flex items-center space-x-4">
                            <input
                                type="number"
                                v-model="minPrice"
                                @input="resetPageAndFetch"
                                placeholder="Min"
                                class="w-1/2 p-2 rounded-lg border"
                                style="border-color: #eae3d2"
                            />
                            <span class="text-gray-500 dark:text-gray-400"
                                >to</span
                            >
                            <input
                                type="number"
                                v-model="maxPrice"
                                @input="resetPageAndFetch"
                                placeholder="Max"
                                class="w-1/2 p-2 rounded-lg border"
                                style="border-color: #eae3d2"
                            />
                        </div>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="lg:w-4/5 lg:px-2 mt-6 lg:mt-0">
                    <div
                        class="flex items-center justify-between mb-6 text-sm uppercase tracking-wider"
                    >
                        <p class="text-gray-500 dark:text-gray-300">
                            {{ total }} Items
                        </p>
                        <div class="flex items-center">
                            <p class="text-gray-500 dark:text-gray-300 mr-2">
                                Sort by
                            </p>
                            <select
                                v-model="sortOption"
                                @change="resetPageAndFetch"
                                class="p-2 rounded-lg border"
                                style="border-color: #eae3d2"
                            >
                                <option value="">Sort by</option>
                                <option value="price_c">
                                    Price (low to high)
                                </option>
                                <option value="price_d">
                                    Price (high to low)
                                </option>
                                <option value="date_c">
                                    Date (old to new)
                                </option>
                                <option value="date_d">
                                    Date (new to old)
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Product Grid Items -->
                    <div
                        class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"
                    >
                        <div
                            v-for="product in res"
                            :key="product.id"
                            class="flex flex-col items-center bg-white border rounded-lg shadow-sm overflow-hidden dark:bg-gray-800 dark:border-gray-700"
                            :style="{ borderColor: '#eae3d2' }"
                        >
                            <a :href="'/product-' + product.id">
                                <img
                                    :alt="product.name"
                                    :src="getImageSrc(product.image)"
                                    class="w-full h-72 object-cover rounded-t-lg transition duration-500 hover:scale-110"
                                />
                            </a>
                            <div class="p-4">
                                <h4
                                    class="text-lg font-medium text-gray-700 dark:text-gray-200"
                                >
                                    {{ product.name }}
                                </h4>
                                <p class="text-blue-500 text-lg">
                                    ${{ (product.price / 100).toFixed(2) }}
                                </p>
                                <p
                                    class="text-gray-600 dark:text-gray-400 mt-2"
                                >
                                    {{ product.description }}
                                </p>
                                <add-to-cart :product-id="product.id" />
                            </div>
                        </div>
                    </div>

                    <!-- Pagination Controls -->
                    <div class="flex justify-between mt-8">
                        <button
                            @click="prevPage"
                            :disabled="currentPage === 1"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50"
                        >
                            Previous
                        </button>
                        <span>Page {{ currentPage }} of {{ totalPages }}</span>
                        <button
                            @click="nextPage"
                            :disabled="currentPage === totalPages"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50"
                        >
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import axios from "axios";
import { onMounted, ref, watch } from "vue";

const props = defineProps({
    gender: {
        type: String,
    },
});
const searchQuery = ref("");
const sortOption = ref("");
const minPrice = ref("");
const maxPrice = ref("");
const res = ref([]);
const currentPage = ref(1);
const totalPages = ref(0);
const total = ref(0);

// Method to fetch products
const fetchProducts = async () => {
    try {
        const response = await axios.get("/api/allProducts", {
            params: {
                searchQuery: searchQuery.value,
                gender: props.gender,
                minPrice: minPrice.value,
                maxPrice: maxPrice.value,
                page: currentPage.value,
                sort: sortOption.value,
            },
        });
        total.value = response.data.total;
        res.value = response.data.products;
        totalPages.value = response.data.last_page;
    } catch (error) {
        console.error("Error fetching products:", error);
    }
};

// Method to handle image source
const getImageSrc = (imageUrl) => {
    // Check if the URL is absolute
    if (imageUrl.startsWith("http://") || imageUrl.startsWith("https://")) {
        return imageUrl;
    } else {
        if (imageUrl.startsWith("public/")) {
            return "/storage/" + imageUrl.replace("public/", "");
        }
    }
};

// Pagination methods
const nextPage = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
        fetchProducts();
    }
};

const prevPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
        fetchProducts();
    }
};

// Reset page number and fetch products
const resetPageAndFetch = () => {
    currentPage.value = 1;
    fetchProducts();
};

// Watchers
watch([searchQuery, sortOption, minPrice, maxPrice], fetchProducts);
watch(currentPage, fetchProducts);

onMounted(fetchProducts);
</script>

<style scoped>
/* Add your component styles here */
</style>
