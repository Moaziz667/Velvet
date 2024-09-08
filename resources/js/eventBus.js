// src/eventBus.js
import { ref } from "vue";

const eventBus = ref({
    $on(event, callback) {
        this[event] = this[event] || [];
        this[event].push(callback);
    },
    $emit(event, ...args) {
        (this[event] || []).forEach((callback) => callback(...args));
    },
});

export default eventBus;
