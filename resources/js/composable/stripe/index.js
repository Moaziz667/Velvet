import { ref } from "vue";
import axios from "axios";
import { saveOrder } from "../../helpers";

export default function useStripe() {
    const elements = ref(null);
    const stripe = ref(null);

    const initialize = async () => {
        try {
            stripe.value = Stripe(
                "pk_test_51Pr2SCRx1wttdKcgcYMMnahqIEMlyfrGf6YcMKrPZESaJRMmYhvV2sSINVMGleDJtBapjyI6dFO92p31BEejJVik00v7vSS4N4"
            );

            const clientSecret = await axios
                .post("/getPaymentIntent")
                .then((r) => r.data.clientSecret)
                .catch((e) => {
                    console.error("Error fetching client secret:", e);
                    return null;
                });

            if (!clientSecret) {
                showMessage("Failed to initialize payment. Please try again.");
                return;
            }

            elements.value = stripe.value.elements({ clientSecret });
            if (!elements.value) {
                console.error("Failed to initialize Stripe elements.");
                showMessage("Failed to initialize payment. Please try again.");
                return;
            }

            const paymentElement = elements.value.create("payment");
            paymentElement.mount("#payment-element");
        } catch (e) {
            console.error("Initialization error:", e);
            showMessage("Failed to initialize payment. Please try again.");
        }
    };

    const checkStatus = async () => {
        const clientSecret = new URLSearchParams(window.location.search).get(
            "payment_intent_client_secret"
        );

        if (!clientSecret) {
            return;
        }

        const { paymentIntent } = await stripe.value.retrievePaymentIntent(
            clientSecret
        );

        switch (paymentIntent.status) {
            case "succeeded":
                showMessage("Payment succeeded!");
                window.location.href = "/merci";

                await saveOrder();
                break;
            case "processing":
                showMessage("Your payment is processing.");
                break;
            case "requires_payment_method":
                showMessage(
                    "Your payment was not successful, please try again."
                );
                break;
            default:
                showMessage("Something went wrong.");
                break;
        }
    };

    const showMessage = (messageText) => {
        const messageContainer = document.querySelector("#payment-message");

        messageContainer.classList.remove("hidden");
        messageContainer.textContent = messageText;

        setTimeout(function () {
            messageContainer.classList.add("hidden");
            messageContainer.textContent = "";
        }, 4000);
    };

    const handleSubmit = async (e) => {
        e.preventDefault(); // Prevent default form submission
        setLoading(true);

        // Check if elements is properly initialized
        if (!elements.value) {
            showMessage("Payment elements not initialized. Please try again.");
            setLoading(false);
            return;
        }

        const { error } = await stripe.value.confirmPayment({
            elements: elements.value,
            confirmParams: {
                // Make sure to change this to your payment completion page
                return_url: "http://127.0.0.1:8000/checkout",
            },
        });

        if (error) {
            if (
                error.type === "card_error" ||
                error.type === "validation_error"
            ) {
                showMessage(error.message);
            } else {
                showMessage("An unexpected error occurred.");
            }
        }

        setLoading(false);
    };

    // Show a spinner on payment submission
    const setLoading = (isLoading) => {
        if (isLoading) {
            // Disable the button and show a spinner
            document.querySelector("#submit").disabled = true;
            document.querySelector("#spinner").classList.remove("hidden");
            document.querySelector("#button-text").classList.add("hidden");
        } else {
            document.querySelector("#submit").disabled = false;
            document.querySelector("#spinner").classList.add("hidden");
            document.querySelector("#button-text").classList.remove("hidden");
        }
    };

    return {
        elements,
        checkStatus,
        initialize,
        showMessage,
        setLoading,
        handleSubmit,
    };
}
