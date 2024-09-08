<template>
    <!-- Modal content -->
    <Teleport to="#modal">
        <div
            v-if="showModal"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
        >
            <div class="modal-content bg-white rounded-lg shadow-lg p-6 w-96">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold text-gray-800">
                        Edit User
                    </h2>
                    <button
                        @click="closeModal"
                        class="text-gray-600 hover:text-gray-900"
                    >
                        <i class="fas fa-times"></i>
                        <!-- Close Icon -->
                    </button>
                </div>
                <div class="mb-4">
                    <input
                        type="text"
                        v-model="name"
                        name="name"
                        placeholder="Name"
                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    />
                </div>
                <div class="mb-4">
                    <input
                        type="email"
                        name="email"
                        v-model="email"
                        placeholder="Email"
                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    />
                </div>
                <div class="mb-4">
                    <input
                        type="text"
                        name="is_admin"
                        v-model="is_admin"
                        placeholder="Admin Status"
                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    />
                </div>

                <!-- Error messages -->
                <div
                    v-if="Object.keys(errors).length"
                    class="text-red-500 text-sm mb-4"
                >
                    <ul>
                        <li
                            v-for="(errorMessages, field) in errors"
                            :key="field"
                        >
                            <i class="fas fa-exclamation-circle"></i>
                            <!-- Error Icon -->
                            {{ errorMessages.join(", ") }}
                        </li>
                    </ul>
                </div>

                <div class="flex justify-end space-x-2">
                    <button
                        @click="updateUser"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
                    >
                        <i class="fas fa-save"></i>
                        <!-- Save Icon -->
                        Update
                    </button>
                    <button
                        @click="closeModal"
                        class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400"
                    >
                        <i class="fas fa-ban"></i>
                        <!-- Cancel Icon -->
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </Teleport>

    <!-- User List -->
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Users</h1>
        <input
            type="text"
            name="search"
            v-model="search"
            placeholder="Search users..."
            class="w-full p-2 mb-6 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
        />
        <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
            <thead>
                <tr
                    class="bg-gray-100 text-left text-gray-600 uppercase text-sm leading-normal"
                >
                    <th class="py-3 px-6">ID</th>
                    <th class="py-3 px-6">Name</th>
                    <th class="py-3 px-6">Email</th>
                    <th class="py-3 px-6">Admin</th>

                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                <tr
                    v-for="user in users"
                    :key="user.id"
                    class="border-b border-gray-200 hover:bg-gray-100"
                    :class="{
                        'bg-black': user.is_admin,
                        'text-white': user.is_admin,
                        'hover:bg-black': user.is_admin,
                    }"
                >
                    <td class="py-3 px-6">{{ user.id }}</td>
                    <td class="py-3 px-6">{{ user.name }}</td>
                    <td class="py-3 px-6">{{ user.email }}</td>
                    <td class="py-3 px-6">
                        {{ user.is_admin ? "Admin" : "User" }}
                    </td>
                    <td
                        class="py-3 px-6 text-center flex space-x-2 justify-center"
                    >
                        <button
                            @click="editUser(user)"
                            class="text-yellow-500 hover:text-yellow-700"
                        >
                            <i class="fas fa-edit"></i>
                            <!-- Edit Icon -->
                        </button>
                        <button
                            @click="deleteUser(user.id)"
                            class="text-red-500 hover:text-red-700"
                        >
                            <i class="fas fa-trash-alt"></i>
                            <!-- Delete Icon -->
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-between mt-6">
            <button
                @click="prevPage"
                class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400"
            >
                <i class="fas fa-arrow-left"></i>
                <!-- Previous Icon -->
                Previous
            </button>
            <button
                @click="nextPage"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
            >
                Next
                <i class="fas fa-arrow-right"></i>
                <!-- Next Icon -->
            </button>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref, watch } from "vue";
import axios from "axios";
import Toaster, { createToaster } from "@meforma/vue-toaster";
import ProductsAdmin from "./ProductsAdmin.vue";

const toaster = createToaster({
    position: "top",
});
const showModal = ref(false);
const users = ref([]);
const search = ref("");
const name = ref("");
const email = ref("");
const selectedUserId = ref(null);
const is_admin = ref(0);
const deleteUser = async (id) => {
    const confirm = window.confirm(
        "Are you sure you want to delete this user?"
    );
    if (!confirm) return;

    await axios.get(`/deleteUser/${id}`);
    getUsers();
};

const editUser = (user) => {
    selectedUserId.value = user.id;
    name.value = user.name;
    email.value = user.email;
    showModal.value = true;
};
const errors = ref([]);
const updateUser = async () => {
    try {
        await axios.post(`/updateUser/${selectedUserId.value}`, {
            name: name.value,
            email: email.value,
            is_admin: is_admin.value,
        });
        getUsers(); // Refresh the user list
        closeModal(); // Close the modal
        toaster.success("User updated successfully");
    } catch (error) {
        if (error.response && error.response.status === 422) {
            console.error("Validation error saving product:", error);
            errors.value = error.response.data.errors; // Update errors with server response
        }
    }
};

const closeModal = () => {
    showModal.value = false;
};
const currentPage = ref(1);
const totalPages = ref(1);
const nextPage = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
        getUsers();
    }
};
const prevPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
        getUsers();
    }
};
const loading = ref(true);
const getUsers = async () => {
    const response = await axios.get("/AllUsers", {
        params: {
            search: search.value,
            page: currentPage.value,
        },
    });
    totalPages.value = response.data.last_page;
    users.value = response.data.data;
};

onMounted(() => {
    getUsers();
});

watch(search, getUsers);
</script>

<style>
.modal {
    @apply fixed inset-0 flex items-center justify-center bg-black bg-opacity-50;
}

.modal-content {
    @apply bg-white rounded-lg shadow-lg p-6 w-96;
}

.table {
    @apply min-w-full bg-white shadow rounded-lg overflow-hidden;
}

.table th,
.table td {
    @apply py-3 px-6;
}

.table tbody tr {
    @apply border-b border-gray-200 hover:bg-gray-100;
}
</style>
