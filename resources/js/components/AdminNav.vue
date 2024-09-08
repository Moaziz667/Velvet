<template>
    <div class="flex min-h-screen bg-gray-400">
        <!-- Sidebar -->
        <aside
            :class="{ 'w-20': isCollapsed, 'w-64': !isCollapsed }"
            class="bg-gray-500 text-white flex-shrink-0 shadow-lg transition-width duration-300 ease-in-out"
        >
            <button
                @click="toggleSidebar"
                class="absolute top-4 right-4 bg-gray-700 text-white p-2 rounded-full hover:bg-gray-600 transition-colors duration-300 ease-in"
                aria-label="Toggle Sidebar"
            >
                <i
                    :class="
                        isCollapsed
                            ? 'fas fa-chevron-right'
                            : 'fas fa-chevron-left'
                    "
                ></i>
            </button>
            <nav class="p-4">
                <div class="flex items-center mb-4">
                    <i class="fas fa-tachometer-alt text-xl mr-2"></i>
                    <h2 v-if="!isCollapsed" class="text-lg font-semibold">
                        Dashboard
                    </h2>
                </div>
                <ul>
                    <li class="mb-2">
                        <router-link
                            to="/admin/dashboard"
                            class="flex items-center py-2 px-4 rounded-lg hover:bg-gray-700 transition-colors duration-300 ease-in"
                        >
                            <i class="fas fa-home mr-3"></i>
                            <span v-if="!isCollapsed">Home</span>
                        </router-link>
                    </li>
                    <li class="mb-2">
                        <router-link
                            to="/admin/products"
                            class="flex items-center py-2 px-4 rounded-lg hover:bg-gray-700 transition-colors duration-300 ease-in"
                        >
                            <i class="fas fa-box mr-3"></i>
                            <span v-if="!isCollapsed">Products</span>
                        </router-link>
                    </li>
                    <li class="mb-2">
                        <router-link
                            to="/admin/users"
                            class="flex items-center py-2 px-4 rounded-lg hover:bg-gray-700 transition-colors duration-300 ease-in"
                        >
                            <i class="fas fa-users mr-3"></i>
                            <span v-if="!isCollapsed">Users</span>
                        </router-link>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-white shadow-md rounded-lg">
            <router-view />
        </main>
    </div>
</template>

<script setup>
import { ref } from "vue";

const isCollapsed = ref(false);

function toggleSidebar() {
    isCollapsed.value = !isCollapsed.value;
}
</script>

<style scoped>
/* Scoped styles for AdminLayout.vue */

aside {
    position: relative;
}

aside .flex {
    display: flex;
    align-items: center;
}

aside button {
    position: absolute;
    top: 1rem;
    right: 1rem;
}

nav ul {
    list-style: none;
    padding: 0;
}

nav ul li a {
    font-size: 14px;
    font-weight: 500;
    display: flex;
    align-items: center;
    color: #e2e8f0;
    padding-left: 1rem;
}

nav ul li a:hover {
    background-color: #4a5568;
}

nav ul li i {
    font-size: 16px;
}

main {
    background-color: #f7fafc;
    border-radius: 8px;
}
</style>
