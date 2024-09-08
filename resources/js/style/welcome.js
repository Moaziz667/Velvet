document.addEventListener("DOMContentLoaded", () => {
    const carousel = document.getElementById("luxury-carousel");
    const items = carousel.querySelectorAll("[data-carousel-item]");
    let currentIndex = 0;

    function showSlide(index) {
        items.forEach((item, i) => {
            item.classList.toggle("hidden", i !== index);
        });
        currentIndex = index;
    }

    function nextSlide() {
        const nextIndex = (currentIndex + 1) % items.length;
        showSlide(nextIndex);
    }

    function prevSlide() {
        const prevIndex = (currentIndex - 1 + items.length) % items.length;
        showSlide(prevIndex);
    }

    // Automatic slide change every 5 seconds
    setInterval(nextSlide, 5000);

    // Initialize first slide
    showSlide(currentIndex);

    // Attach event listeners for controls
    carousel
        .querySelector("[data-carousel-prev]")
        .addEventListener("click", prevSlide);
    carousel
        .querySelector("[data-carousel-next]")
        .addEventListener("click", nextSlide);
});
