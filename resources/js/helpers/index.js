import axios from "axios";
export const formatPrice = (price) => {
    return new Intl.NumberFormat("de-DE", {
        style: "currency",
        currency: "EUR",
    }).format(price / 100);
};
export const saveOrder = async () => {
    await axios.post("/saveOrder");
};
