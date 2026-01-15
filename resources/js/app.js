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

/* Success Page animation */
import confetti from "canvas-confetti";

document.addEventListener("DOMContentLoaded", () => {
    const loader = document.getElementById("loader");
    const card = document.getElementById("successCard");
    const checkWrapper = document.getElementById("checkWrapper");

    if (!loader || !card) return;

    // 1️⃣ Simulate processing delay
    setTimeout(() => {
        loader.classList.add("hidden");
        card.classList.remove("hidden");

        // 2️⃣ Animate card in
        requestAnimationFrame(() => {
            card.classList.remove("opacity-0", "scale-95");
            card.classList.add("opacity-100", "scale-100");
        });
    }, 1500);

    // 3️⃣ Checkmark bounce
    setTimeout(() => {
        checkWrapper.classList.add("animate-bounce");
    }, 2000);

    // 4️⃣ Confetti 🎉
    setTimeout(() => {
        confetti({
            particleCount: 120,
            spread: 70,
            origin: { y: 0.6 },
        });
    }, 2200);

    // Optional auto redirect
    // setTimeout(() => {
    //     window.location.href = "/dashboard";
    // }, 6000);
});
