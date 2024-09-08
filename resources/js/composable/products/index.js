import axios from "axios";
import { ref } from "vue";
export default function useProduct() {
    const products = ref([]);
    const cartCount = ref(0);
    const increaseProduct = async (productId) => {
        await axios.post("/api/products/increase/" + productId);
    };
    const decreaseProduct = async (productId) => {
        await axios.post("/api/products/decrease/" + productId);
    };
    const removeProduct = async (productId) => {
        await axios.delete("/api/products/" + productId);
    };

    const getProducts = async () => {
        let response = await axios.get("/api/products");
        products.value = response.data.products;
        cartCount.value = response.data.cartCount;
    };
    const add = async (productId) => {
        let response = await axios.post("/api/products", {
            productId: productId,
        });
        return response.data.count;
    };
    const getCount = async () => {
        let response = await axios.get("api/products/count");
        return response.data.count;
    };

    return {
        add,
        getCount,
        products,
        getProducts,
        increaseProduct,
        decreaseProduct,
        removeProduct,
        cartCount,
    };
}
