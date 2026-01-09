import "./bootstrap";

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
