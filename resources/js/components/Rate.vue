<template>
    <div class="p-4">
        <div class="mb-4">
            <span class="text-xl font-semibold">Rating:</span>
        </div>
        <div class="flex items-center mb-4">
            <span class="text-lg font-medium mr-2">Average Rating:</span>
            <div class="flex">
                <span
                    v-for="star in stars"
                    :key="'avg-' + star"
                    class="text-2xl"
                    :class="{
                        'text-yellow-400': star <= averageRating,
                        'text-gray-500': star > averageRating,
                    }"
                >
                    ★
                </span>
            </div>
        </div>
        <div class="flex items-center mb-4">
            <span class="text-lg font-medium mr-2">Your Rating:</span>
            <div class="flex">
                <span
                    v-for="star in stars"
                    :key="'user-' + star"
                    @click="setRate(star)"
                    @mouseover="hoverRate(star)"
                    @mouseleave="resetHover"
                    class="text-2xl transition-colors cursor-pointer"
                    :class="{
                        'text-yellow-400':
                            star <= (hoveredRating || userRating),
                        'text-gray-500': star > (hoveredRating || userRating),
                    }"
                >
                    ★
                </span>
            </div>
        </div>
        <div v-if="loading" class="mt-4 text-center text-gray-500">
            Loading...
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";
import { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster({
    position: "top-right",
    duration: 5000,
});

// Props
const props = defineProps({
    product_id: Number,
});

// State
const rate = ref(0);
const averageRating = ref(0);
const userRating = ref(0); // User's previous rating
const hoveredRating = ref(null); // Rating on hover
const loading = ref(true); // Loading state

// Stars Array
const stars = [1, 2, 3, 4, 5];

// Fetch data on component mount
onMounted(async () => {
    try {
        const response = await axios.get(`/api/rate/${props.product_id}`);
        averageRating.value = response.data.rate;
        userRating.value = response.data.old_rate
            ? response.data.old_rate.rate
            : 0;
    } catch (error) {
        console.error("Error fetching rating data:", error);
    } finally {
        loading.value = false; // Hide loading state once data is fetched
    }
});

// Method to set rating
const setRate = async (value) => {
    rate.value = value;
    try {
        const response = await axios.post("/api/rate", {
            rate: rate.value,
            product_id: props.product_id,
        });

        toaster.success(
            `Thank you for rating our product ${rate.value} stars! Your feedback helps us improve.`,
            {
                position: "top-right",
                duration: 5000,
                max: 1,
            }
        );

        averageRating.value = response.data; // Update average rating after submitting
        userRating.value = rate.value; // Update user's rating
    } catch (error) {
        console.error("Error submitting rating:", error);
        toaster.error("Oops! Something went wrong. Please try again.");
    }
};

// Methods for hover effects
const hoverRate = (value) => {
    hoveredRating.value = value;
};

const resetHover = () => {
    hoveredRating.value = null;
};
</script>

<style scoped>
/* Tailwind CSS handles the styling */
</style>
