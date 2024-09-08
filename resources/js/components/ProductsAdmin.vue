<template>
    <div class="p-6 bg-gray-50 min-h-screen">
        <h1 class="text-4xl font-bold text-gray-900 mb-10">Products</h1>
        <div class="mb-4">
            Search By Name:
            <input
                type="text"
                class="m-2"
                @input="fetchProducts"
                v-model="QueryString"
            />
        </div>
        <button
            @click="openAddModal"
            class="bg-gray-800 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-gray-700 transition duration-300 ease-in-out"
        >
            Add Product
        </button>

        <!-- Loading Spinner -->
        <div v-if="isLoading" class="flex justify-center items-center h-64">
            <svg
                class="animate-spin h-10 w-10 text-gray-800"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
            >
                <circle
                    class="opacity-25"
                    cx="12"
                    cy="12"
                    r="10"
                    stroke="currentColor"
                    stroke-width="4"
                />
                <path
                    class="opacity-75"
                    fill="currentColor"
                    d="M4 12a8 8 0 0116 0H4z"
                />
            </svg>
        </div>

        <!-- Teleported Modal -->
        <teleport to="#modal">
            <div
                v-if="showModal"
                class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-60 z-50"
            >
                <div
                    class="bg-white p-6 rounded-lg shadow-lg relative z-50 w-full max-w-lg"
                >
                    <h2 class="text-2xl font-semibold mb-6 text-gray-800">
                        {{ editMode ? "Edit" : "Add" }} Product
                    </h2>
                    <form @submit.prevent="saveProduct">
                        <!-- Name Input -->
                        <div class="mb-5">
                            <label
                                for="name"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Name
                            </label>
                            <input
                                type="text"
                                v-model="newProduct.name"
                                id="name"
                                class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-gray-700 focus:border-gray-700"
                                placeholder="Enter product name"
                                required
                            />
                            <p
                                v-if="errors.name"
                                class="text-red-600 text-xs mt-2"
                            >
                                {{ errors.name[0] }}
                            </p>
                        </div>

                        <!-- Price Input -->
                        <div class="mb-5">
                            <label
                                for="price"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Price
                            </label>
                            <input
                                type="number"
                                v-model="newProduct.price"
                                id="price"
                                class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-gray-700 focus:border-gray-700"
                                placeholder="Enter product price"
                                step="0.01"
                                required
                            />
                            <p
                                v-if="errors.price"
                                class="text-red-600 text-xs mt-2"
                            >
                                {{ errors.price[0] }}
                            </p>
                        </div>

                        <!-- Active Checkbox -->
                        <div class="mb-5 flex items-center">
                            <input
                                type="checkbox"
                                v-model="newProduct.active"
                                id="active"
                                class="h-5 w-5 text-gray-700 border-gray-300 rounded focus:ring-2 focus:ring-gray-700"
                            />
                            <label
                                for="active"
                                class="ml-2 text-sm text-gray-700"
                            >
                                Active
                            </label>
                            <p
                                v-if="errors.active"
                                class="text-red-600 text-xs mt-2"
                            >
                                {{ errors.active[0] }}
                            </p>
                        </div>

                        <!-- Description Textarea -->
                        <div class="mb-5">
                            <label
                                for="description"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Description
                            </label>
                            <textarea
                                v-model="newProduct.description"
                                id="description"
                                rows="4"
                                class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-gray-700 focus:border-gray-700"
                                placeholder="Enter product description"
                                required
                            ></textarea>
                            <p
                                v-if="errors.description"
                                class="text-red-600 text-xs mt-2"
                            >
                                {{ errors.description[0] }}
                            </p>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-5">
                            <label
                                for="image"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Image
                            </label>
                            <input
                                type="file"
                                id="image"
                                @change="handleImageUpload"
                                class="border border-gray-300 rounded-lg shadow-sm w-full"
                                accept="image/*"
                            />
                            <p
                                v-if="errors.image"
                                class="text-red-600 text-xs mt-2"
                            >
                                {{ errors.image[0] }}
                            </p>
                        </div>

                        <!-- Gender Select -->
                        <div class="mb-5">
                            <label
                                for="gender"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Gender
                            </label>
                            <select
                                v-model="newProduct.gender"
                                id="gender"
                                class="border border-gray-300 p-3 rounded-lg w-full focus:ring-2 focus:ring-gray-700 focus:border-gray-700"
                                required
                            >
                                <option value="" disabled>Select Gender</option>
                                <option value="Men">Men</option>
                                <option value="Women">Women</option>
                                <option value="Other">Other</option>
                            </select>
                            <p
                                v-if="errors.gender"
                                class="text-red-600 text-xs mt-2"
                            >
                                {{ errors.gender[0] }}
                            </p>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button
                                type="submit"
                                class="bg-gray-800 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-gray-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-gray-700"
                            >
                                Save Product
                            </button>
                        </div>
                    </form>

                    <!-- Close Button -->
                    <button
                        @click="closeModal"
                        class="absolute top-4 right-4 bg-red-600 text-white p-2 rounded-full hover:bg-red-700 transition duration-300 ease-in-out"
                    >
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </teleport>

        <!-- Product Table -->
        <table
            v-if="!isLoading && products.length > 0"
            class="w-full mt-8 bg-white shadow-lg rounded-lg overflow-hidden border border-gray-300"
        >
            <thead class="bg-gray-200 border-b border-gray-300">
                <tr>
                    <th class="text-left px-5 py-3 font-medium text-gray-700">
                        Image
                    </th>
                    <th class="text-left px-5 py-3 font-medium text-gray-700">
                        Name
                    </th>
                    <th class="text-left px-5 py-3 font-medium text-gray-700">
                        Price
                    </th>
                    <th class="text-left px-5 py-3 font-medium text-gray-700">
                        Description
                    </th>
                    <th class="text-left px-5 py-3 font-medium text-gray-700">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="product in products"
                    :key="product.id"
                    class="border-b border-gray-300"
                >
                    <td class="px-5 py-4">
                        <img
                            :src="getImageSrc(product.image)"
                            alt="Product Image"
                            class="w-20 h-20 object-cover rounded-lg shadow-sm"
                        />
                    </td>
                    <td class="px-5 py-4 text-gray-800">{{ product.name }}</td>
                    <td class="px-5 py-4 text-gray-800">{{ product.price }}</td>
                    <td class="px-5 py-4 text-gray-800">
                        {{ product.description }}
                    </td>
                    <td class="px-5 py-4">
                        <button
                            @click="openEditModal(product)"
                            class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 ease-in-out mr-2"
                        >
                            Edit
                        </button>
                        <button
                            @click="deleteProduct(product.id)"
                            class="bg-red-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-700 transition duration-300 ease-in-out"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <p
            v-if="!isLoading && products.length === 0"
            class="text-2xl text-red-600 flex justify-center m-12"
        >
            No products Found !! &#x1F610;
        </p>

        <!-- Pagination Controls -->
        <div class="flex justify-between mt-6">
            <button
                @click="prevPage"
                :disabled="currentPage <= 1 || isLoading"
                class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 ease-in-out"
            >
                Prev
            </button>
            <button
                @click="nextPage"
                :disabled="currentPage >= totalPages || isLoading"
                class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 ease-in-out"
            >
                Next
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import Toaster, { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster({
    position: "top",
});

const QueryString = ref("");
const currentPage = ref(1);
const totalPages = ref(0);
const products = ref([]);
const errors = ref({});
const showModal = ref(false);
const editMode = ref(false);
const currentProductId = ref(null);
const newProduct = ref({
    name: "",
    price: "",
    active: false,
    description: "",
    image: null,
    gender: "",
});
const isLoading = ref(false);

const fetchProducts = async () => {
    isLoading.value = true;
    try {
        const response = await axios.get("/AllProducts", {
            params: { page: currentPage.value, QueryString: QueryString.value },
        });
        products.value = response.data.data || [];
        totalPages.value = response.data.last_page || 1;
    } catch (error) {
        console.error("Error fetching products:", error);
        products.value = [];
    } finally {
        isLoading.value = false;
    }
};

const saveProduct = async () => {
    try {
        const formData = new FormData();
        formData.append("name", newProduct.value.name);
        formData.append("price", newProduct.value.price);
        formData.append("active", newProduct.value.active ? "1" : "0");
        formData.append("description", newProduct.value.description);
        formData.append("gender", newProduct.value.gender);
        if (newProduct.value.image) {
            formData.append("image", newProduct.value.image);
        }

        if (editMode.value) {
            await axios.post(
                `/updateProduct/${currentProductId.value}`,
                formData,
                {
                    headers: { "Content-Type": "multipart/form-data" },
                }
            );
            toaster.success("Product updated successfully");
        } else {
            await axios.post("/addProduct", formData, {
                headers: { "Content-Type": "multipart/form-data" },
            });
            toaster.success("Product added successfully &#x1F60E;");
        }

        showModal.value = false;
        fetchProducts();
        errors.value = {}; // Clear errors on successful submission
    } catch (error) {
        if (error.response && error.response.status === 422) {
            console.error("Validation error saving product:", error);
            errors.value = error.response.data.errors; // Update errors with server response
        } else {
            console.error(
                "Error saving product:",
                error.response ? error.response.data : error
            );
        }
    }
};

const openAddModal = () => {
    editMode.value = false;
    resetForm();
    showModal.value = true;
};

const openEditModal = (product) => {
    editMode.value = true;
    currentProductId.value = product.id;
    newProduct.value = { ...product, image: null }; // Reset image
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};

const resetForm = () => {
    newProduct.value = {
        name: "",
        price: "",
        active: false,
        description: "",
        image: null,
        gender: "",
    };
};

const handleImageUpload = (event) => {
    newProduct.value.image = event.target.files[0];
};

const getImageSrc = (imageUrl) => {
    if (imageUrl.startsWith("http://") || imageUrl.startsWith("https://")) {
        return imageUrl;
    }

    if (imageUrl.startsWith("public/")) {
        return "/storage/" + imageUrl.replace("public/", "");
    }

    return imageUrl;
};

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

const deleteProduct = async (id) => {
    const confirmed = window.confirm(
        "Are you sure you want to delete this product?"
    );
    if (!confirmed) return;

    try {
        await axios.get(`/deleteProduct/${id}`);
        fetchProducts();
        toaster.success("Product deleted successfully");
    } catch (error) {
        console.error("Error deleting product:", error);
    }
};

onMounted(fetchProducts);
</script>

<style scoped>
/* Simple styles for Products.vue */
</style>
