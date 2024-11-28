// Initialize EmailJS
(function () {
    emailjs.init("YOUR_PUBLIC_KEY"); // Replace YOUR_PUBLIC_KEY with your actual EmailJS Public Key
})();

// Handle form submission
window.onload = function () {
    const form = document.querySelector(".php-email-form");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Show loading animation
        const loading = form.querySelector(".loading");
        const errorMessage = form.querySelector(".error-message");
        const sentMessage = form.querySelector(".sent-message");

        loading.style.display = "block";
        errorMessage.style.display = "none";
        sentMessage.style.display = "none";

        // Send the form using EmailJS
        emailjs
            .sendForm("YOUR_SERVICE_ID", "YOUR_TEMPLATE_ID", form) // Replace YOUR_SERVICE_ID and YOUR_TEMPLATE_ID with actual IDs
            .then(() => {
                loading.style.display = "none";
                sentMessage.style.display = "block"; // Show success message
                form.reset(); // Clear the form
            })
            .catch((error) => {
                loading.style.display = "none";
                errorMessage.textContent =
                    "Failed to send message. Please try again later.";
                errorMessage.style.display = "block"; // Show error message
                console.error("EmailJS error:", error);
            });
    });
};
