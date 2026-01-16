import "./bootstrap";

/* successfully updated profile effect */
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

    // Simulating processing delay
    setTimeout(() => {
        loader.classList.add("hidden");
        card.classList.remove("hidden");

        // Animating card in
        requestAnimationFrame(() => {
            card.classList.remove("opacity-0", "scale-95");
            card.classList.add("opacity-100", "scale-100");
        });
    }, 1500);

    // Checkmarking bounce
    setTimeout(() => {
        checkWrapper.classList.add("animate-bounce");
    }, 2000);

    // Implementing Confetti properties
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

/* FAQ Accordion functionality */
document.querySelectorAll(".faq-question").forEach((button) => {
    button.addEventListener("click", () => {
        const answer = button.nextElementSibling;
        const arrow = button.querySelector(".faq-arrow");
        const isOpen =
            answer.style.maxHeight && answer.style.maxHeight !== "0px";

        // Toggle the answer
        if (isOpen) {
            answer.style.maxHeight = "0";
            arrow.style.transform = "rotate(0deg)";
        } else {
            answer.style.maxHeight = answer.scrollHeight + "px";
            arrow.style.transform = "rotate(180deg)";
        }
    });
});

/* Left and Right Scroll */

const cardsContainer = document.getElementById("cardsContainer");
const leftBtn = document.getElementById("scrollLeft");
const rightBtn = document.getElementById("scrollRight");

const cardWidth = 352; // 320px + 32px gap
const originalCards = Array.from(cardsContainer.children);
const totalCards = originalCards.length;

// Clone all cards and append them twice for smooth infinite loop
for (let i = 0; i < 2; i++) {
    originalCards.forEach((card) => {
        const clone = card.cloneNode(true);
        cardsContainer.appendChild(clone);
    });
}

let currentPosition = 0;
let isAnimating = false;

function updatePosition() {
    cardsContainer.style.transform = `translateX(-${
        currentPosition * cardWidth
    }px)`;
}

rightBtn.addEventListener("click", () => {
    if (isAnimating) return;
    isAnimating = true;

    currentPosition++;
    updatePosition();

    setTimeout(() => {
        // When we reach the end of the first set, reset to beginning without animation
        if (currentPosition >= totalCards) {
            cardsContainer.style.transition = "none";
            currentPosition = 0;
            updatePosition();

            // Re-enable transition after reset
            setTimeout(() => {
                cardsContainer.style.transition = "transform 0.5s ease-out";
                isAnimating = false;
            }, 50);
        } else {
            isAnimating = false;
        }
    }, 500);
});

leftBtn.addEventListener("click", () => {
    if (isAnimating) return;
    isAnimating = true;

    // If at the beginning, jump to the end of first set without animation
    if (currentPosition === 0) {
        cardsContainer.style.transition = "none";
        currentPosition = totalCards;
        updatePosition();

        setTimeout(() => {
            cardsContainer.style.transition = "transform 0.5s ease-out";
            currentPosition--;
            updatePosition();

            setTimeout(() => {
                isAnimating = false;
            }, 500);
        }, 50);
    } else {
        currentPosition--;
        updatePosition();

        setTimeout(() => {
            isAnimating = false;
        }, 500);
    }
});

// Initialize
updatePosition();
