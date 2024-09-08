import { createApp } from "vue";
import AddToCart from "./components/AddToCart.vue"; // Import your Vue component
import Alpine from "alpinejs"; // Import Alpine.js
import NavbarCart from "./components/NavbarCart.vue";
import ShoppingCart from "./components/ShoppingCart.vue";
import StripeCheckout from "./components/StripeCheckout.vue";
import SearchItems from "./components/SearchItems.vue";
import Rate from "./components/Rate.vue";
import AdminNav from "./components/AdminNav.vue";
import ProductsAdmin from "./components/ProductsAdmin.vue";
import UsersAdmin from "./components/UsersAdmin.vue";
import Home from "./components/Home.vue";
import router from "./router/index"; // Import your Vue router
import EditProd from "./components/EditProd.vue";
import Spinner from "./components/Spinner.vue";
import Notif from "./components/Notif.vue";
const app = createApp({});
app.use(router); // Use Vue router
// Register Vue component globally
app.component("ProductsAdmin", ProductsAdmin);
app.component("UsersAdmin", UsersAdmin);
app.component("Home", Home);
app.component("Spinner", Spinner);
app.component("AdminNav", AdminNav);
app.component("StripeCheckout", StripeCheckout);
app.component("AddToCart", AddToCart);
app.component("NavbarCart", NavbarCart);
app.component("ShoppingCart", ShoppingCart);
app.component("Rate", Rate);
app.component("SearchItems", SearchItems);
app.component("EditProd", EditProd);
app.component("Notif", Notif);
// Mount Vue app
app.mount("#app");
// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();
