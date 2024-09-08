<template>
    <button
        @click="addToCart"
        class="mt-4 w-full px-4 py-2 font-medium text-white bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 inline-block"
            viewBox="0 0 20 20"
            fill="currentColor"
        >
            <path
                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
            />
        </svg>
        <span class="ml-2">Add to cart</span>
    </button>
</template>

<script setup>
import { inject, ref } from "vue";
import { defineProps } from "vue";
import useProduct from "../composable/products";
import eventBus from "../eventBus";
import axios from "axios";

import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({});

const emit = defineEmits(["countUpdated"]);
const { add } = useProduct();
const productId = defineProps(["productId"]);
const toast = inject("toast");
const addToCart = async () => {
    await axios.get("/sanctum/csrf-cookie");
    await axios
        .get("/api/user")
        .then(async (res) => {
            let countValue = await add(productId);
            toaster.success("Produit ajouté au panier !");
            eventBus.value.$emit("countUpdated", countValue);
        })
        .catch(() => {
            toaster.error(" Veuillez vous connecter pour ajouter au panier !");
        });
};
</script>

<style scoped>
/* Add your component-specific styles here */
</style>
