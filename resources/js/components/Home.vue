<template>
    <transition name="fade">
        <div
            v-if="isModalOpen"
            class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-60"
        >
            <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">
                <h2 class="text-lg font-semibold mb-4 text-gray-800">
                    If Order is Shipped, please confirm it and select the date
                </h2>
                <label class="block mb-4 text-gray-700">Date</label>
                <input
                    class="w-full p-2 border border-gray-300 rounded-lg mb-4"
                    type="date"
                    v-model="shipped_at"
                />
                <div class="flex justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-300 ease-in-out"
                        @click.prevent="confirm"
                    >
                        Confirm Ship
                    </button>
                    <button
                        @click="closeModal"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-300 ease-in-out"
                    >
                        Close Modal
                    </button>
                </div>
            </div>
        </div>
    </transition>

    <div class="p-4">
        <h1 class="text-3xl font-bold mb-6 text-gray-900">Orders</h1>

        <div
            v-for="order in orders"
            :key="order.id"
            :class="[
                'border rounded-lg mb-6 p-6 shadow-lg',
                { 'bg-gray-50': order.shipped_at },
            ]"
        >
            <div class="relative mb-4">
                <button
                    v-if="!order.shipped_at"
                    @click="confirmShip(order)"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-300 ease-in-out"
                >
                    <svg
                        class="w-5 h-5 inline-block mr-2"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                        />
                    </svg>
                    Confirm Ship
                </button>
                <div
                    v-if="order.shipped_at"
                    class="absolute top-2 right-2 px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full"
                >
                    Shipped
                </div>
            </div>
            <div class="flex justify-between items-center mb-4">
                <span class="font-medium text-gray-700">Order Number:</span>
                <span class="text-4xl font-extrabold text-gray-900">
                    {{ order.order_number }}
                </span>
            </div>
            <div class="mb-4">
                <span class="font-medium text-gray-700">Order Date:</span>
                <span class="text-gray-900">
                    {{ new Date(order.created_at).toLocaleDateString() }}
                </span>
            </div>
            <div v-if="order.products.length" class="space-y-4">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">
                    Products:
                </h2>
                <div
                    v-for="product in order.products"
                    :key="product.id"
                    class="flex border rounded-lg p-4 bg-gray-50"
                >
                    <img
                        :src="product.image"
                        alt=""
                        class="w-24 h-24 object-cover rounded-md mr-4"
                    />
                    <div class="flex-1">
                        <p class="font-medium text-gray-900">
                            {{ product.name }}
                        </p>
                        <p class="text-gray-600">{{ product.description }}</p>
                        <p class="text-gray-800">
                            Price: ${{ (product.price / 100).toFixed(2) }}
                        </p>
                        <p class="text-gray-500">
                            Quantity: {{ product.pivot.total_quantity }}
                        </p>
                        <p class="font-bold text-gray-900">
                            Total: ${{
                                (product.pivot.total_price / 100).toFixed(2)
                            }}
                        </p>
                    </div>
                </div>
            </div>
            <div v-else class="text-gray-500 mt-4">
                No products in this order.
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";

const shipped_at = ref(null);
const isModalOpen = ref(false);
const order_id = ref(null);

const closeModal = () => {
    isModalOpen.value = false;
};

const confirm = async () => {
    if (!shipped_at.value) {
        alert("Please select a date.");
        return;
    }

    try {
        await axios.post(`/order/${order_id.value}`, {
            shipped_at: shipped_at.value,
        });
        isModalOpen.value = false;
        getOrders();
    } catch (error) {
        console.error(error);
    }
};

const orders = ref([]);

const confirmShip = (order) => {
    isModalOpen.value = true;
    order_id.value = order.id;
};

const getOrders = async () => {
    try {
        const res = await axios.get("/orders");
        orders.value = res.data;
    } catch (error) {
        console.error(error);
    }
};

onMounted(() => {
    getOrders();
});
</script>

<style scoped>
/* Custom styles */
.border {
    border: 1px solid #e2e8f0;
}
.bg-white {
    background-color: #ffffff;
}
.bg-gray-100 {
    background-color: #f7fafc;
}
.text-gray-600 {
    color: #718096;
}
.text-gray-800 {
    color: #2d3748;
}
.text-gray-500 {
    color: #a0aec0;
}
.font-semibold {
    font-weight: 600;
}
.font-bold {
    font-weight: 700;
}
.shadow-lg {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}
.bg-green-100 {
    background-color: #d4f4dd;
}
.text-green-800 {
    color: #2d6a4f;
}
.rounded-full {
    border-radius: 9999px;
}
.text-xs {
    font-size: 0.75rem;
}
</style>
