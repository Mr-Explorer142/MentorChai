import "./bootstrap";

/*  */
document.addEventListener("DOMContentLoaded", () => {
    const alert = document.getElementById("success-alert");

    if (alert) {
        setTimeout(() => {
            alert.classList.remove("opacity-100");
            alert.classList.add("opacity-0");

            setTimeout(() => {
                alert.remove();
            }, 700); // match transition duration
        }, 5000);
    }
});

/* Copy to clipboard feature */
document.addEventListener("DOMContentLoaded", () => {
    const copyButtons = document.querySelectorAll(".copy-btn");

    copyButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            e.stopPropagation(); // prevent triggering card clicks if needed
            const textToCopy = button.getAttribute("data-copy");

            navigator.clipboard
                .writeText(textToCopy)
                .then(() => {
                    // Optionally show a temporary tooltip instead of alert
                    const originalText = button.innerHTML;
                    button.innerHTML = "✓"; // temporary check mark
                    setTimeout(() => (button.innerHTML = originalText), 1000);
                })
                .catch((err) => console.error("Failed to copy:", err));
        });
    });
});


/* Theme switching */
