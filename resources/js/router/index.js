import { createRouter, createWebHistory } from "vue-router";
import Home from "../components/Home.vue";
import ProductsAdmin from "../components/ProductsAdmin.vue";
import UsersAdmin from "../components/UsersAdmin.vue";

const routes = [
    {
        path: "/admin/dashboard",
        name: "Home",
        component: Home,
    },
    {
        path: "/admin/products",
        name: "ProductsAdmin",
        component: ProductsAdmin,
    },
    {
        path: "/admin/users",
        name: "UsersAdmin",
        component: UsersAdmin,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
