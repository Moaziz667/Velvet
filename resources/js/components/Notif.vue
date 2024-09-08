<template>
    <div class="relative">
        <!-- Notification Bell Icon -->
        <div
            @click="toggleDropdown"
            class="relative cursor-pointer flex items-center"
        >
            <i
                class="fas fa-bell text-white text-xl md:text-2xl"
                :class="bellClasses"
            ></i>
            <span
                v-if="nb > 0"
                class="absolute top-0 right-0 transform -translate-x-1/2 -translate-y-1/2 bg-red-600 text-white text-xs font-bold rounded-full px-2 py-1"
                >{{ nb }}</span
            >
        </div>

        <!-- Dropdown for Notifications -->
        <transition name="fade">
            <div
                v-if="showDropdown"
                class="absolute right-0 mt-2 bg-gray-900 text-white w-80 rounded-lg shadow-xl overflow-hidden z-50"
            >
                <ul v-if="notif.length" class="divide-y divide-gray-700">
                    <li
                        v-for="(notification, index) in displayedNotif"
                        :key="notification.id"
                        class="flex items-start p-4 hover:bg-gray-800 cursor-pointer transition ease-in-out duration-300"
                    >
                        <i
                            class="fas fa-info-circle text-blue-400 mr-3 text-lg"
                        ></i>
                        <div class="flex-1">
                            <p class="text-sm font-semibold">
                                Order Number: {{ notification.number }}
                            </p>
                            <p class="text-sm font-semibold">
                                User ID: {{ notification.user_id }}
                            </p>

                            <p class="text-xs">{{ notification.message }}</p>
                            <p class="text-xs text-gray-400">
                                {{
                                    new Date(
                                        notification.created_at
                                    ).toLocaleString()
                                }}
                            </p>
                        </div>
                        <button
                            @click.stop="readAt(notification.id)"
                            class="ml-2 bg-red-500 text-white rounded-full p-2 hover:bg-red-600 transition ease-in-out duration-300"
                        >
                            <i class="fas fa-times"></i>
                        </button>
                    </li>
                </ul>
                <p
                    v-if="notif.length > 6"
                    class="p-2 text-center text-blue-400 cursor-pointer hover:underline"
                    @click="showMore = !showMore"
                >
                    {{ showMore ? "Show Less" : "Show More" }}
                </p>
                <p v-else class="p-4 text-center text-gray-400">
                    VELVET {{ nb }} Notifications
                </p>
            </div>
        </transition>
    </div>
</template>

<script setup>
import { onMounted, ref, computed } from "vue";
import axios from "axios";

const notif = ref([]);
const nb = ref(0);
const showDropdown = ref(false);
const showMore = ref(false);

const readAt = async (id) => {
    try {
        await axios.get(`/deleteNotif/${id}`);
        notif.value = notif.value.filter((n) => n.id !== id);
        nb.value = notif.value.length;
    } catch (error) {
        console.log(error);
    }
};

const getNotif = async () => {
    try {
        const res = await axios.get("/Notif");
        const notifications = res.data;

        for (let notification of notifications) {
            const data = JSON.parse(notification.data);
            notification.number = data.order_number;
            notification.message = data.message || "No message";
            notification.created_at = data.created_at || "Unknown time";
            notification.user_id = data.user; // Add user_id from notification data
        }

        notif.value = notifications;
        nb.value = notifications.length;
    } catch (error) {
        console.log(error);
    }
};

const toggleDropdown = () => {
    showDropdown.value = !showDropdown.value;
};

const displayedNotif = computed(() => {
    return showMore.value || notif.value.length <= 6
        ? notif.value
        : notif.value.slice(0, 6);
});

// Define classes for the bell icon to adjust size and styling
const bellClasses = computed(() => {
    return "text-lg md:text-xl"; // Adjust sizes as needed
});

onMounted(() => {
    getNotif();
});
</script>

<style scoped>
/* Optional: Add custom styles for a more polished look */
</style>
