<template>
    <div class="hidden sm:flex items-center space-x-8 mr-10">
        <a href="/shoppingCart" class="relative flex items-center">
            <span
                v-if="!loading"
                class="absolute -top-1 left-4 rounded-full bg-indigo-700 w-5 h-5 text-xs text-white flex items-center justify-center"
            >
                {{ countValue }}
            </span>
            <span
                v-else
                class="absolute -top-1 left-4 rounded-full bg-gray-300 w-5 h-5 text-xs text-white flex items-center justify-center"
            >
                <!-- You can add a spinner here -->
                <svg
                    class="animate-spin h-4 w-4 text-white"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 4v8l4 2"
                    />
                </svg>
            </span>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-7 w-7 text-gray-600"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                />
            </svg>
        </a>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import useProduct from "../composable/products";
import eventBus from "../eventBus";

const countValue = ref(0); // Start with null
const loading = ref(true); // Add loading state
const { getCount } = useProduct();

// Handle count updates via event bus
eventBus.value.$on("countUpdated", (count) => {
    countValue.value = count;
    loading.value = false; // Update loading state
});

// Fetch count on mount
onMounted(async () => {
    try {
        const count = await getCount();
        countValue.value = count;
    } catch (error) {
        console.error("Error fetching count:", error);
    } finally {
        loading.value = false; // Ensure loading state is updated
    }
});
</script>

<style scoped>
/* Add your component styles here */
</style>
